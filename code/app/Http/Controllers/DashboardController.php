<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\License;
use App\Models\LicenseEdit;
use App\Models\Location;
use App\Models\Driver;
use App\Models\DriverPhoto;

use Validator;
use DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $driver = auth()->guard('driveruser')->user();
        /*$driver->load(['photo', 'calls.location', 'payments', 'license', 'messages']);

        $driver->calls = $driver->calls->sortByDesc('datetime');
        $driver->payments = $driver->payments->sortByDesc('paymentdatetime');
        $driver->messages = $driver->messages->sortByDesc('messages');*/

        $data['locations']=$locations = Location::all();
        $data['driver']=Driver::where('driverid',$driver->driverid)        
        ->with([
            'photo',
            'calls.location',
            'payments',
            'license',
            'messages'=>function($q){
                $q->where('messagestatus','0');
                $q->orderBy('messagedatetime','desc');
            }
        ])
        ->first();
        
        //return view('drivers.profile', compact('driver', 'locations'));
        return view('drivers.profile')->with($data);


        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function editProfileImage()
    {
        $data=array();
        $driver = auth()->guard('driveruser')->user();
        $driverid=$driver->driverid;
        
        $driver_query=Driver::where('driverid',$driverid)->with(['photo'])->first();

        //dd($driver->photo->driversphoto);
        $data['driver_query']=$driver_query; 
        
        return view('profile_image_edit_modal')->with($data);        
    }

    public function updateProfileImage(Request $request)
    {

        DB::beginTransaction();
        $exception="";
        try{
            $rules = array(
                'profilephoto' => 'required',

            );
            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()){                
                $res = array(
                    'status' => 2,
                    'message' => 'Validator Failed',
                    'errors' => $validator->errors()
                );                
                return response()->json($res);
            }//validator fails

            $driver = auth()->guard('driveruser')->user();
            $driverid=$driver->driverid;

            $profilephoto = 
            base64_encode(
                file_get_contents(
                    $request->file('profilephoto')->path()
                )
            );

            $check_if_already_exists=DriverPhoto::where('driverid',$driverid)->first();
            if($check_if_already_exists)
            {
                $update_data=array(
                    'driverid'=>$driverid,
                    'driversphoto'=>$profilephoto
                );
                DriverPhoto::where('driverid',$driverid)->update($update_data);
            }else{
                $create_data=array(
                    'driverid'=>$driverid,
                    'driversphoto'=>$profilephoto
                );
                DriverPhoto::create($create_data);
            }
            
            $endStatus=1;
            DB::commit();
        }catch(\Exception $e){
            $exception=$e->getMessage();
            DB::rollback();
            $endStatus=0;
        }
        if($endStatus==1){
            $res = array(
                'status' => 1,
                'message' => 'Updated Successfully',
                'alert_class' => 'alert-success',
                'alert_message' => 'Updated Successfully',
                'exception'=>$exception
            );
        }else{
            $res = array(
                'status' =>  2,
                'message' => 'Un-Successful Operation',
                'alert_class' => 'alert-danger',
                'alert_message' => 'Un-Successful Operation',
                'exception'=>$exception
            );
        }
        return response()->json($res);

        
    
    }
    public function getOffTime(){
        $driver = auth()->guard('driveruser')->user();
        $driverid=$driver->driverid;
        
        $driver_query=Driver::where('driverid',$driverid)->first();
        if($driver_query->dutystatus==1)
        {
            return 'Auto off duty at '.date('d,M h:i A',strtotime($driver_query->offtime_timestamp));
        }else{
            return '';
        }
    }

    public function editDriver()
    {
        $data=array();
        $driver = auth()->guard('driveruser')->user();
        $driverid=$driver->driverid;
        
        $driver_query=Driver::where('driverid',$driverid)->with(['photo'])->first();

        //dd($driver->photo->driversphoto);
        $data['driver_query']=$driver_query; 
        
        return view('driver_edit_modal')->with($data);        
    }

    public function updateDriver(Request $request)
    {

        DB::beginTransaction();
        $exception="";
        try{
            $rules = array(
                'phone' => 'required|max:11',
                'email' => 'required',
                'businessurl' => 'required',
                'description' => 'required',

            );
            $rulesMessages=array(
                'phone.required' => 'This field is required',
                'phone.max' => 'This field must not be greater than 11 characters.',
                'email.required' => 'This field is required',
                'businessurl.required' => 'This field is required',
                'description.required' => 'This field is required',
            );
            $validator = Validator::make($request->all(),$rules,$rulesMessages);
            if($validator->fails()){                
                $res = array(
                    'status' => 2,
                    'message' => 'Validator Failed',
                    'errors' => $validator->errors()
                );                
                return response()->json($res);
            }//validator fails

            $driver = auth()->guard('driveruser')->user();
            $driverid=$driver->driverid;

            //form field starts
            $phone=$request->input('phone');
            $email=$request->input('email');
            $businessurl=$request->input('businessurl');
            $description=$request->input('description');

            $four_seatervehicle=0;
            $eight_seatervehicle=0;
            $estatevehicle=0;
            $courier=0;
            $easyaccessvehicle=0;
            $airportruns=0;
            $wheelchairfriendly=0;

            if($request->has('4seatervehicle'))
            {
                $four_seatervehicle=1;
            }
            if($request->has('8seatervehicle'))
            {
                $eight_seatervehicle=1;
            }
            if($request->has('estatevehicle'))
            {
                $estatevehicle=1;
            }
            if($request->has('courier'))
            {
                $courier=1;
            }
            if($request->has('easyaccessvehicle'))
            {
                $easyaccessvehicle=1;
            }
            if($request->has('airportruns'))
            {
                $airportruns=1;
            }
            if($request->has('wheelchairfriendly'))
            {
                $wheelchairfriendly=1;
            }
            //form field ends

            $update_data=array(
                'phone'=>$phone,
                'email'=>$email,
                'businessurl'=>$businessurl,
                'description'=>$description,

                '4seatervehicle'=>$four_seatervehicle,
                '8seatervehicle'=>$eight_seatervehicle,
                'estatevehicle'=>$estatevehicle,
                'courier'=>$courier,
                'easyaccessvehicle'=>$easyaccessvehicle,
                'airportruns'=>$airportruns,
                'wheelchairfriendly'=>$wheelchairfriendly,

            );


            Driver::where('driverid',$driverid)->update($update_data);
            
            $endStatus=1;
            DB::commit();
        }catch(\Exception $e){
            $exception=$e->getMessage();
            DB::rollback();
            $endStatus=0;
        }
        if($endStatus==1){
            $res = array(
                'status' => 1,
                'message' => 'Updated Successfully',
                'alert_class' => 'alert-success',
                'alert_message' => 'Updated Successfully',
                'exception'=>$exception
            );
        }else{
            $res = array(
                'status' =>  2,
                'message' => 'Un-Successful Operation',
                'alert_class' => 'alert-danger',
                'alert_message' => 'Un-Successful Operation',
                'exception'=>$exception
            );
        }
        return response()->json($res);

        
    
    }

    public function getListing(Request $request)
    {

    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

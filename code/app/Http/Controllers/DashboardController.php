<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\License;
use App\Models\LicenseEdit;
use App\Models\Location;
use App\Models\Driver;
use App\Models\DriverPhoto;
use App\Models\DriverEdit;
use App\Models\EditDriverPhoto;
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
            'license.licenseauthoritymaster',
            'messages'=>function($q){
                $q->where('messagestatus','0');
                $q->orderBy('messagedatetime','desc');
            }
        ])
        ->first();
      /*  dd($data['driver']);*/

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

        $already_in_queue_to_approve=0;
        $driver_edit_count=EditDriverPhoto::where('driverid',$driverid)
        ->where('approved','0')
        ->count();
        if($driver_edit_count>0)
        {
            $already_in_queue_to_approve=1;
        }
        $data['already_in_queue_to_approve']=$already_in_queue_to_approve;
        
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

            /*$check_if_already_exists=DriverPhoto::where('driverid',$driverid)->first();
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
            }*/

            $create_data=array(
                'driverid'=>$driverid,
                'driversphoto'=>$profilephoto
            );
            EditDriverPhoto::create($create_data);

            $driverEntry = Driver::where('driverid',$driverid)->first();

            if ($driverEntry->adminapproved == 2) {
                $driverEntry->update(array(
                    'adminapproved'=>0
                ));
            };
            
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
                'message' => 'Successfully submitted for Approval',
                'alert_class' => 'alert-success',
                'alert_message' => 'Successfully submitted for Approval',
                'exception'=>$exception
            );
        }else{
            $res = array(
                'status' =>  2,
                'message' => 'Successfully submitted for Approval',
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

        $already_in_queue_to_approve=0;
        $driver_edit_count=DriverEdit::where('driverid',$driverid)
        ->where('approved','0')
        ->count();
        if($driver_edit_count>0)
        {
            $already_in_queue_to_approve=1;
        }
        $data['already_in_queue_to_approve']=$already_in_queue_to_approve;
        
        return view('driver_edit_modal')->with($data);        
    }

    public function updateDriver(Request $request)
    {

        DB::beginTransaction();
        $exception="";
        try{
            $rules = array(
                'firstname' => 'required',
                'lastname' => 'required',
                'phone' => 'required|max:11',
                'email' => 'required',
                

            );
            $rulesMessages=array(
                'firstname.required' => 'This field is required',
                'lastname.required' => 'This field is required',
                'phone.required' => 'This field is required',
                'phone.max' => 'This field must not be greater than 11 characters.',
                'email.required' => 'This field is required',
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
            $firstname=trim($request->input('firstname'));
            $lastname=trim($request->input('lastname'));
            $phone=trim($request->input('phone'));
            $email=trim($request->input('email'));
            $businessurl=trim($request->input('businessurl'));
            $description=trim($request->input('description'));
            $addressline1=trim($request->input('addressline1'));
            $addressline2=trim($request->input('addressline2'));
            $town=trim($request->input('town'));
            $county=trim($request->input('county'));
            $postcode=trim($request->input('postcode'));
            

            $four_seatervehicle=0;
            $eight_seatervehicle=0;
            $estatevehicle=0;
            $courier=0;
            $easyaccessvehicle=0;
            $airportruns=0;
            $wheelchairfriendly=0;
            $six_seatervehicle=0;
            $longdistance=0;

            if($request->has('6seatervehicle'))
            {
                $six_seatervehicle=1;
            }if($request->has('longdistance'))
            {
                $longdistance=1;
            }

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

            //get driver query starts
            $get_query=Driver::where('driverid',$driverid)->first();
            //by default we are sending entries to edit table
            $send_entries_to_edit_table=1;
            if(
                isset($get_query) &&
                $firstname==trim($get_query->firstname) &&
                $lastname==trim($get_query->lastname) &&
                $phone==trim($get_query->phone) &&
                $email==trim($get_query->email) &&
                $businessurl==trim($get_query->businessurl) &&
                $description==trim($get_query->description) &&
                $addressline1==trim($get_query->addressline1) &&
                $addressline2==trim($get_query->addressline2) &&
                $town==trim($get_query->town) &&
                $county==trim($get_query->county) &&
                $postcode==trim($get_query->postcode)
            ){
                //donot send entries to edit table
                $send_entries_to_edit_table=0;
            }
            //get driver query ends

            $update_data=array(
                //'firstname' => $firstname, //have to approve
                //'lastname' => $lastname, //have to approve
                //'phone'=>$phone, //have to approve
                //'email'=>$email, //have to approve
                //'businessurl'=>$businessurl, //have to approve
                //'description'=>$description, //have to approve

                '4seatervehicle'=>$four_seatervehicle,
                '8seatervehicle'=>$eight_seatervehicle,
                'estatevehicle'=>$estatevehicle,
                'courier'=>$courier,
                'easyaccessvehicle'=>$easyaccessvehicle,
                'airportruns'=>$airportruns,
                'wheelchairfriendly'=>$wheelchairfriendly,
                '6seatervehicle'=>$six_seatervehicle,
                'longdistance'=>$longdistance,

                //'postcode'=>$postcode, //have to approve
                //'county'=>$county, //have to approve
                //'town'=>$town, //have to approve
                //'addressline2'=>$addressline2, //have to approve
                //'addressline1'=>$addressline1, //have to approve



            );


            Driver::where('driverid',$driverid)->update($update_data);

            $edit_data=array(
                'driverid'=>$driverid,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'phone' => $phone,
                'email' => $email,
                'businessurl'=>$businessurl,
                'description'=>$description,
                'addressline1'=>$addressline1,
                'addressline2'=>$addressline2,
                'town'=>$town,
                'county'=>$county,
                'postcode'=>$postcode,
                
            );

            if($send_entries_to_edit_table==1){                
                DriverEdit::create($edit_data);

                if ($get_query->adminapproved == 2) {
                    Driver::where('driverid',$driverid)->update(array(
                        'adminapproved'=>0
                    ));
                }
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
                'message' => 'Successfully submitted for Approval',
                'alert_class' => 'alert-success',
                'alert_message' => 'Successfully submitted for Approval',
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

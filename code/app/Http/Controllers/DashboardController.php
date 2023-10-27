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
        $driver->load(['photo', 'calls.location', 'payments', 'license', 'messages']);

        $driver->calls = $driver->calls->sortByDesc('datetime');
        $driver->payments = $driver->payments->sortByDesc('paymentdatetime');
        $driver->messages = $driver->messages->sortByDesc('messages');

        $locations = Location::all();
        
        return view('drivers.profile', compact('driver', 'locations'));


        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function editProfile()
    {
        $data=array();
        $driver = auth()->guard('driveruser')->user();
        $driverid=$driver->driverid;
        
        $driver_query=Driver::where('driverid',$driverid)->with(['photo'])->first();

        //dd($driver->photo->driversphoto);
        $data['driver_query']=$driver_query; 
        
        return view('profile_edit_modal')->with($data);        
    }

    public function updateProfile(Request $request)
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
            //base64_encode(
                file_get_contents(
                    $request->file('profilephoto')->path()
                );
            //);

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

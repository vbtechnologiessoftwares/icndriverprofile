<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\License;
use App\Models\Driver;
use App\Models\LicenseEdit;

use Validator;
use DB;

class CronController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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

    public function turnOffDuty(){
        $current_timestamp=date('Y-m-d H:i:s');
        $update_data=array(
            'dutystatus'=>0,
            'offtime_timestamp'=>null,
            'offtime_timestamp_created_at'=>null,
        );
        Driver::where('offtime_timestamp','<',$current_timestamp)->update($update_data);
    }

    public function getDriverDutyStatus(){
        $driverid=auth()->user()->driverid;
        $driver_query=Driver::where('driverid',$driverid)->first();
        $driver_duty_status=$driver_query->dutystatus;
        return response()->json([
            'status' => 1,
            'dutystatus' => $driver_duty_status,
        ]); 
    }

    public function openHoursModal(){
        $data=array();
        $driver = auth()->guard('driveruser')->user();
        $driverid=$driver->driverid;
        return view('duty_hours_modal')->with($data);
    }
    public function hoursUpdate(Request $request){ 
        DB::beginTransaction();
        $exception="";
        try{
            $rules = array(
                'hours' => 'required',
                'minutes' => 'required',
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

            $validator->after(function($validator) use($request){
                if($request->hours=='0' && $request->minutes=='0')
                {
                    $validator->errors()->add('hours','Please select hours');
                }
                elseif($request->hours=='8' && in_array($request->minutes, ['15','30','45']))
                {
                    $validator->errors()->add('minutes','The minutes must be 00 in case of 8 hours ');
                }
                else{

                }
            });
            if($validator->fails()){                
                $res = array(
                    'status' => 2,
                    'message' => 'Validator Failed',
                    'errors' => $validator->errors()
                );                
                return response()->json($res);
            }//validator fails

            //dd('test');
            $driverid=auth()->user()->driverid;

            $hours=$request->input('hours');
            $minutes=$request->input('minutes');

            $hours_to_seconds=intval($hours)*3600;
            $minutes_to_seconds=intval($minutes)*60;
            $dev_seconds=$hours_to_seconds+$minutes_to_seconds;

            $offtime_timestamp=strtotime(date('Y-m-d H:i:s'))+$dev_seconds;
            $offtime_timestamp=date('Y-m-d H:i:s',$offtime_timestamp);

            //$driver = auth()->guard('driveruser')->user();
            //$driverid=$driver->driverid;
            
            $data=array(
                'dutystatus'=>1,
                'offtime_timestamp'=>$offtime_timestamp,
                'offtime_timestamp_created_at'=>date('Y-m-d H:i:s')
            );
            $find_query=Driver::find($driverid);
            $find_query->update($data);
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
    public function toggleDutyStatus(Request $request)
    {
        $data = $request->validate(['action' => 'required|in:on,off']);
        $driver = auth()->user();
        $driver->dutystatus = $data['action'] == "on" ? 1 : 0;
        $driver->offtime_timestamp=NULL;
        $driver->offtime_timestamp_created_at=NULL;
        $driver->save();

        return response()->json([
            'status' => 'success',
            'message' => "Status updated",
        ]);

    }
}

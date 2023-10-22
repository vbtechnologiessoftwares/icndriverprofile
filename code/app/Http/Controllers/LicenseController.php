<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\License;
use App\Models\Driver;
use App\Models\LicenseEdit;

use Validator;
use DB;

class LicenseController extends Controller
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
        $data=array();
        $driver = auth()->guard('driveruser')->user();
        $driverid=$driver->driverid;

        $already_in_queue_to_approve=0;
        $license_edit_count=LicenseEdit::where('driverid',$driverid)
        ->where('approved','0')
        ->count();
        if($license_edit_count>0)
        {
            $already_in_queue_to_approve=1;
        }
        $license_query=License::where('driverid',$driverid)->first();
        $driver_query=Driver::where('driverid',$driverid)->first();

        
        $data['license_query']=$license_query; 
        $data['driver_query']=$driver_query; 
        $data['already_in_queue_to_approve']=$already_in_queue_to_approve; 
        
        return view('license_edit_modal')->with($data);
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
        DB::beginTransaction();
        $exception="";
        try{
            $rules = array(
                'licensephoto' => 'required',
                'licensenumber' => 'required',
                'licenseexpiry' => 'required',

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
            $licensephoto = 
            base64_encode(
                file_get_contents(
                    $request->file('licensephoto')->path()
                )
            );
            $create_data=array(
                'driverid'=>$driverid,
                'licensenumber'=>$request->input('licensenumber'),
                'licenseexpiry'=>$request->input('licenseexpiry'),
                'licensephoto'=>$licensephoto
            );
            LicenseEdit::create($create_data);
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

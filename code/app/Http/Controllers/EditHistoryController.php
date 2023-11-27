<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\License;
use App\Models\LicenseEdit;
use App\Models\Location;
use Carbon\Carbon;
use Validator;
use App\Models\DriverMessage;
use Illuminate\Validation\ValidationException;
use DB;

class EditHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=array();
        $driver = auth()->guard('driveruser')->user();
        $data['driver']=$driver;

        return view('drivers.edit_history')->with($data);
    }

    public function getListing(Request $request)
    {
        $orderArray = array(
          '0'=>'id',
          '1'=>'id',
          '2'=>'approveddatetime',
          '3'=>'approved',
          '4'=>'licenseeditdatetime',
        );
        $where=array();
        $datatableForm = $this->getDatatableData($request->all());
        $driver = auth()->guard('driveruser')->user();
        $driverid=$driver->driverid;

        //$driver->load(['photo', 'calls.location', 'payments', 'license', 'messages']);

        $where[]=['driverid','=',$driverid];
        $where[]=['approved','=','0'];
        /*if($request->input('name')){
            $where[]=['name','LIKE','%'.$request->input('name').'%'];
        }*/
        $query=LicenseEdit::where($where);

        $queryCloneObj = clone $query;
        $totalCount = $queryCloneObj->count();
        $query = clone $query;

        $query =  $query
        ->orderBy($orderArray[$datatableForm['orderColumn']],$datatableForm['orderMethod'])
        ->skip($datatableForm['offset'])
        ->take($datatableForm['length'])
        ->get();
        //->toarray();
        
        $result = array("data"=>array());
        $i=1;

        foreach ($query as $key => $value) { 

            /*
            0=pending;
            1=approved;
            2=rejected;
            3=revoked
            */  
            $approved_by_admin='<span style="color:red">Pending</span>';

            $edit_date=$value->licenseeditdatetime;
            if(trim($value->approveddatetime)=='1000-01-01 00:00:00')
            {
                $approved_date='NA';
            }else{
                $approved_date=$value->approveddatetime;
            }
            if($value->approved=='0'){
               $approved_by_admin='<span style="color:red">Pending</span>';
            }
            elseif($value->approved=='1'){
               $approved_by_admin='<span style="color:green">Approved</span>';
            }
            elseif($value->approved=='2'){
                $approved_by_admin='<span style="color:red">Rejected</span>';
            }
            elseif($value->approved=='3'){
                $approved_by_admin='<span style="color:red">Revoked</span>';
            }else{
                $approved_by_admin='<span style="color:red">Pending</span>';
            }
            $license_photo=''; 
            $license_photo='<img src="data:image/png;base64,'.htmlspecialchars($value->licensephoto).'" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded-3 user-profile-img" />';  
            $revoke_btn='<button class="btn btn-primary change-status-btn" data-licenseeditid="'.$value->licenseeditid.'" data-status="3">Revoke</button>';
            

            $result["data"][$key] = array(
                $i++,
                $license_photo,
                $approved_date,
                $approved_by_admin,
                $edit_date,
                $revoke_btn,
            );
            

        }

        $newData = array(
          'draw'=>$datatableForm['draw'],
          'recordsTotal'=>$totalCount,
          'recordsFiltered'=>$totalCount,
          'data'=>$result["data"]
        );

        return $newData;
                
    }

    public function getListing2(Request $request)
    {
        $orderArray = array(
          '0'=>'id',
          '1'=>'id',
          '2'=>'approveddatetime',
          '3'=>'approved',
          '4'=>'licenseeditdatetime',
        );
        $where=array();
        $datatableForm = $this->getDatatableData($request->all());
        $driver = auth()->guard('driveruser')->user();
        $driverid=$driver->driverid;

        //$driver->load(['photo', 'calls.location', 'payments', 'license', 'messages']);

        $where[]=['driverid','=',$driverid];
        $where[]=['approved','!=','0'];
        /*if($request->input('name')){
            $where[]=['name','LIKE','%'.$request->input('name').'%'];
        }*/
        $query=LicenseEdit::where($where);

        $queryCloneObj = clone $query;
        $totalCount = $queryCloneObj->count();
        $query = clone $query;

        $query =  $query
        ->orderBy($orderArray[$datatableForm['orderColumn']],$datatableForm['orderMethod'])
        ->skip($datatableForm['offset'])
        ->take($datatableForm['length'])
        ->get();
        //->toarray();
        
        $result = array("data"=>array());
        $i=1;

        foreach ($query as $key => $value) {  
            /*
            0=pending;
            1=approved;
            2=rejected;
            3=revoked
            */ 
            

            $edit_date=$value->licenseeditdatetime;
            if(trim($value->approveddatetime)=='1000-01-01 00:00:00')
            {
                $approved_date='NA';
            }else{
                $approved_date=$value->approveddatetime;
            }

            if($value->approved=='0'){
               $approved_by_admin='<span style="color:red">Pending</span>';
            }
            elseif($value->approved=='1'){
               $approved_by_admin='<span style="color:green">Approved</span>';
            }
            elseif($value->approved=='2'){
                $approved_by_admin='<span style="color:red">Rejected</span>';
            }
            elseif($value->approved=='3'){
                $approved_by_admin='<span style="color:red">Revoked</span>';
            }else{
                $approved_by_admin='<span style="color:red">Pending</span>';
            }
            $license_photo=''; 
            $license_photo='<img src="data:image/png;base64,'.htmlspecialchars($value->licensephoto).'" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded-3 user-profile-img" />';  
            

            $result["data"][$key] = array(
                $i++,
                $license_photo,
                $approved_date,
                $approved_by_admin,
                $edit_date,
            );
            

        }

        $newData = array(
          'draw'=>$datatableForm['draw'],
          'recordsTotal'=>$totalCount,
          'recordsFiltered'=>$totalCount,
          'data'=>$result["data"]
        );

        return $newData;
                
    }

     public function changeHistoryStatus(Request $request)
    {
        
   
        $current = Carbon::now();

       $licenseeditid=  $request->licenseeditid;

        $licenseeditvalues=LicenseEdit::where('licenseeditid',$licenseeditid)->first();
        DB::beginTransaction();
        $exception="";
        try{
            $rules = array(
                'licenseeditid' => 'required',
                'status' => 'required',

            );
            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()){                
                $res = array(
                    'status' => 2,
                    'message' => 'Validator Failed',
                    'alert_class' => 'alert-danger',
                    'alert_message' => 'Validation Failed! Some Required parameters missing!',
                    'errors' => $validator->errors()
                );                
                return response()->json($res);
            }//validator fails
if($licenseeditvalues->approved!=0){
   throw ValidationException::withMessages(['approved' => 'Edit approved status is already non zero. Cannot change status']);
}
            $licensephoto=$licenseeditvalues->licensephoto;
            $licensenumber=$licenseeditvalues->licensenumber;
            $licenseexpiry=$licenseeditvalues->licenseexpiry;
            $driverid=$licenseeditvalues->driverid;
           
            if($request->status==1){

                        $data=array(
                'licensephoto'=>$licensephoto,
                'licensenumber'=>$licensenumber,
                'licenseexpiry'=>$licenseexpiry,
            );
            $find_query=License::find($driverid);
            $find_query->update($data);
            $endStatus=1;
            }else{
              
                 $create_data=array(
                    'messageid'=>$request->message_id,
                    'driverid'=>$driverid,
                    'messagestatus'=>0,
                    'messagedatetime'=>$current->toDateTimeString(),
                    
                );
               DriverMessage::create($create_data);
            }

            $update_licenseid_data=array(
                'approved'=>$request->status,
                'approvedbyadminid'=>$request->approvedbyadminid,
                'approveddatetime'=>$current->toDateTimeString(),
               
            );

            $find_query=LicenseEdit::find($licenseeditid);
            $find_query->update($update_licenseid_data);
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
                'message' => 'Status Successfully',
                'alert_class' => 'alert-success',
                'alert_message' => 'Revoked Successfully',
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


    public function changeStatus(Request $request)
    {
        
        DB::beginTransaction();
        $exception="";
        try{
            $rules = array(
                'licenseeditid' => 'required',
                'status' => 'required',

            );
            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()){                
                $res = array(
                    'status' => 2,
                    'message' => 'Validator Failed',
                    'alert_class' => 'alert-danger',
                    'alert_message' => 'Validation Failed! Some Required parameters missing!',
                    'errors' => $validator->errors()
                );                
                return response()->json($res);
            }

            $licenseeditid=$request->input('licenseeditid');
            $status=$request->input('status');
            //$driver = auth()->guard('driveruser')->user();
            //$driverid=$driver->driverid;
            
            $data=array(
                'approved'=>$status,
            );
            $find_query=LicenseEdit::find($licenseeditid);
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
                'message' => 'Revoked Successfully',
                'alert_class' => 'alert-success',
                'alert_message' => 'Revoked Successfully',
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

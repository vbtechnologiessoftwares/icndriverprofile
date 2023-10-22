<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\License;
use App\Models\LicenseEdit;
use App\Models\Location;

use Validator;
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
        /*if($request->input('name')){
            $where[]=['name','LIKE','%'.$request->input('name').'%'];
        }*/
        $query=LicenseEdit::where('driverid',$driverid);

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
            $approved_by_admin='<span style="color:red">Pending</span>';

            $edit_date=$value->licenseeditdatetime;
            if(trim($value->approveddatetime)=='1000-01-01 00:00:00')
            {
                $approved_date='NA';
            }else{
                $approved_date=$value->approveddatetime;
            }

            if($value->approved=='1'){
               $approved_by_admin='<span style="color:green">Approved</span>'; 
            }
            $license_photo=''; 
            $license_photo='<img src="data:image/png;base64,'.$value->licensephoto.'" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded-3 user-profile-img" />';  
            

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

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DriverMessage;

use Validator;
use DB;

class MessageController extends Controller
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

        return view('drivers.messages')->with($data);
    }

    public function getListing(Request $request)
    {
        $orderArray = array(
          '0'=>'id',
          '1'=>'id',
          '2'=>'messagestatus',
          '3'=>'messagedatetime',
        );
        $where=array();
        $datatableForm = $this->getDatatableData($request->all());
        $driver = auth()->guard('driveruser')->user();
        $driverid=$driver->driverid;

        //$driver->load(['photo', 'calls.location', 'payments', 'license', 'messages']);

        $where[]=['driverid','=',$driverid];
        //$where[]=['approved','=','0'];
        /*if($request->input('name')){
            $where[]=['name','LIKE','%'.$request->input('name').'%'];
        }*/
        //$query=LicenseEdit::where($where);

        $query=DriverMessage::where($where)->with(['message']);


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
            $message_text=$value->message->messagetext;
            $date=$value->messagedatetime->toFormattedDateString();

            if($value->messagestatus)
            {
              $status='1';  
            }else{
                $status='0'; 
            }
            
            $result["data"][$key] = array(
                $i++,
                $message_text,
                $status,
                $date,
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

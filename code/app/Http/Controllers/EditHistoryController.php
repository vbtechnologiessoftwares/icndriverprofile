<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\License;
use App\Models\LicenseEdit;
use App\Models\DriverEdit;
use App\Models\Location;
use Carbon\Carbon;
use Validator;
use App\Models\DriverMessage;
use App\Models\Driver;
use App\Models\EditDriverPhoto;
use Mail;

use Illuminate\Validation\ValidationException;
use DB;

class EditHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = array();
        $driver = auth()->guard('driveruser')->user();
        $data['driver'] = $driver;
        if ($request->has('tab')) {
            $data['tab'] = $request->tab;
        } else {
            $data['tab'] = '';
        }

        return view('drivers.edit_history')->with($data);
    }

    public function getListing(Request $request)
    {
        $orderArray = array(
            '0' => 'id',
            '1' => 'id',
            '2' => 'approveddatetime',
            '3' => 'approved',
            '4' => 'licenseeditdatetime',
            '5' => 'licenseauthority',
        );
        $where = array();
        $datatableForm = $this->getDatatableData($request->all());
        $driver = auth()->guard('driveruser')->user();
        $driverid = $driver->driverid;

        //$driver->load(['photo', 'calls.location', 'payments', 'license', 'messages']);

        $where[] = ['driverid', '=', $driverid];
        $where[] = ['approved', '=', '0'];
        /*if($request->input('name')){
            $where[]=['name','LIKE','%'.$request->input('name').'%'];
        }*/
        $query = LicenseEdit::where($where);


        $queryCloneObj = clone $query;
        $totalCount = $queryCloneObj->count();
        $query = clone $query;

        $query = $query
            ->orderBy($orderArray[$datatableForm['orderColumn']], $datatableForm['orderMethod'])
            ->skip($datatableForm['offset'])
            ->take($datatableForm['length'])
            ->get();
        //->toarray();

        $result = array("data" => array());
        $i = 1;

        foreach ($query as $key => $value) {

            /*
            0=pending;
            1=approved;
            2=rejected;
            3=revoked
            */
            $approved_by_admin = '<span style="color:red">Pending</span>';

            $edit_date = $value->licenseeditdatetime;
            if (trim($value->approveddatetime) == '1000-01-01 00:00:00') {
                $approved_date = 'NA';
            } else {
                $approved_date = $value->approveddatetime;
            }
            if ($value->approved == '0') {
                $approved_by_admin = '<span style="color:red">Pending</span>';
            } elseif ($value->approved == '1') {
                $approved_by_admin = '<span style="color:green">Approved</span>';
            } elseif ($value->approved == '2') {
                $approved_by_admin = '<span style="color:red">Rejected</span>';
            } elseif ($value->approved == '3') {
                $approved_by_admin = '<span style="color:red">Revoked</span>';
            } else {
                $approved_by_admin = '<span style="color:red">Pending</span>';
            }
            $license_photo = '';
            $license_photo = '<img src="data:image/png;base64,' . htmlspecialchars($value->licensephoto) . '" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded-3 user-profile-img" />';
            $revoke_btn = '<button class="btn btn-primary change-status-btn" data-licenseeditid="' . $value->licenseeditid . '" data-status="3">Revoke</button>';


            $result["data"][$key] = array(
                $i++,
                $license_photo,
                $approved_date,
                $approved_by_admin,
                $edit_date,
                $value->licenseauthority,
                $revoke_btn,
            );


        }

        $newData = array(
            'draw' => $datatableForm['draw'],
            'recordsTotal' => $totalCount,
            'recordsFiltered' => $totalCount,
            'data' => $result["data"]
        );

        return $newData;

    }

    public function getListing2(Request $request)
    {
        $orderArray = array(
            '0' => 'id',
            '1' => 'id',
            '2' => 'approveddatetime',
            '3' => 'approved',
            '4' => 'licenseeditdatetime',
        );
        $where = array();
        $datatableForm = $this->getDatatableData($request->all());
        $driver = auth()->guard('driveruser')->user();
        $driverid = $driver->driverid;

        //$driver->load(['photo', 'calls.location', 'payments', 'license', 'messages']);

        $where[] = ['driverid', '=', $driverid];
        $where[] = ['approved', '!=', '0'];
        /*if($request->input('name')){
            $where[]=['name','LIKE','%'.$request->input('name').'%'];
        }*/
        $query = LicenseEdit::where($where);

        $queryCloneObj = clone $query;
        $totalCount = $queryCloneObj->count();
        $query = clone $query;

        $query = $query
            ->orderBy($orderArray[$datatableForm['orderColumn']], $datatableForm['orderMethod'])
            ->skip($datatableForm['offset'])
            ->take($datatableForm['length'])
            ->get();
        //->toarray();

        $result = array("data" => array());
        $i = 1;

        foreach ($query as $key => $value) {
            /*
            0=pending;
            1=approved;
            2=rejected;
            3=revoked
            */


            $edit_date = $value->licenseeditdatetime;
            if (trim($value->approveddatetime) == '1000-01-01 00:00:00') {
                $approved_date = 'NA';
            } else {
                $approved_date = $value->approveddatetime;
            }

            if ($value->approved == '0') {
                $approved_by_admin = '<span style="color:red">Pending</span>';
            } elseif ($value->approved == '1') {
                $approved_by_admin = '<span style="color:green">Approved</span>';
            } elseif ($value->approved == '2') {
                $approved_by_admin = '<span style="color:red">Rejected</span>';
            } elseif ($value->approved == '3') {
                $approved_by_admin = '<span style="color:red">Revoked</span>';
            } else {
                $approved_by_admin = '<span style="color:red">Pending</span>';
            }
            $license_photo = '';
            $license_photo = '<img src="data:image/png;base64,' . htmlspecialchars($value->licensephoto) . '" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded-3 user-profile-img" />';


            $result["data"][$key] = array(
                $i++,
                $license_photo,
                $approved_date,
                $approved_by_admin,
                $value->licenseauthority,
                $edit_date,
            );


        }

        $newData = array(
            'draw' => $datatableForm['draw'],
            'recordsTotal' => $totalCount,
            'recordsFiltered' => $totalCount,
            'data' => $result["data"]
        );

        return $newData;

    }
    public function driversinupinfo(Request $request)
    {
        $current = Carbon::now();

        $driverid = $request->driverid;

        /*$drivereditvalues=DriverEdit::where('drivereditid',$driverid)->first();*/
        $drivervalues = Driver::where('driverid', $driverid)->first();
        DB::beginTransaction();
        $exception = "";
        try {
            $rules = array(
                'driverid' => 'required',
                'status' => 'required',

            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $res = array(
                    'status' => 2,
                    'message' => 'Validator Failed',
                    'alert_class' => 'alert-danger',
                    'alert_message' => 'Validation Failed! Some Required parameters missing!',
                    'errors' => $validator->errors()
                );
                return response()->json($res);
            } //validator fails
            if ($drivervalues->adminapproved == 1) {
                throw ValidationException::withMessages(['approved' => 'Account is already Approved Cannot Change Status']);
            }
            if ($request->status == 1) {

                $data = array(
                    'adminapproved' => $request->status,

                );
                $find_query = Driver::find($driverid);
                $find_query->update($data);
                $endStatus = 1;
            } else {
                $create_data = array(
                    'messageid' => $request->message_id,
                    'driverid' => $driverid,
                    'messagestatus' => 0,
                    'messagedatetime' => $current->toDateTimeString(),

                );
                DriverMessage::create($create_data);
            }

            $update_licenseid_data = array(
                'approved' => $request->status,
                'approvedbyadminid' => $request->approvedbyadminid,
                'approveddatetime' => $current->toDateTimeString(),

            );

            $find_query = DriverEdit::where('driverid', $driverid)->first();
            $find_query->update($update_licenseid_data);

            $find_query = LicenseEdit::where('driverid', $driverid)->first();
            $find_query->update($update_licenseid_data);
            $endStatus = 1;
            DB::commit();
            $mailstatus = $request->status == 1 ? 'Approved' : 'Rejected';

            /*+++++++++++++Email Start Code ++++++++++++++++++*/
            $driver_info = Driver::where('driverid', $find_query->driverid)->first();
            $mailTo = $driver_info->email;

            $subject = 'Your Driver Account Has Been ' . $mailstatus . '.';
            Mail::send(
                'email.singupapproved',
                [
                    'name' => $driver_info->firstname,
                    'mailTo' => $mailTo,
                    'subject' => $subject,
                ],
                function ($message) use ($mailTo, $subject) {
                    $message->to($mailTo)
                        ->subject($subject);

                }
            );
            /*+++++++++++++Email End Code ++++++++++++++++++*/

        } catch (\Exception $e) {
            $exception = $e->getMessage();
            DB::rollback();
            $endStatus = 0;
        }
        if ($endStatus == 1) {
            $res = array(
                'status' => 1,
                'message' => 'Status Successfully',
                'alert_class' => 'alert-success',
                'alert_message' => 'Revoked Successfully',
                'exception' => $exception
            );
        } else {
            $res = array(
                'status' => 2,
                'message' => 'Un-Successful Operation',
                'alert_class' => 'alert-danger',
                'alert_message' => 'Un-Successful Operation',
                'exception' => $exception
            );
        }
        return response()->json($res);



    }

    public function changeprofile(Request $request)
    {
        $current = Carbon::now();

        $driverid = $request->profileedit_id;

        $drivereditvalues = DriverEdit::where('drivereditid', $driverid)->first();
        DB::beginTransaction();
        $exception = "";
        try {
            $rules = array(
                'profileedit_id' => 'required',
                'status' => 'required',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $res = array(
                    'status' => 2,
                    'message' => 'Validator Failed',
                    'alert_class' => 'alert-danger',
                    'alert_message' => 'Validation Failed! Some Required parameters missing!',
                    'errors' => $validator->errors()
                );
                return response()->json($res);
            } //validator fails
            if ($drivereditvalues->approved != 0) {
                throw ValidationException::withMessages(['approved' => 'Edit approved status is already non zero. Cannot change status']);
            }
            $firstname = $drivereditvalues->firstname;
            $lastname = $drivereditvalues->lastname;
            $phone = $drivereditvalues->phone;
            $email = $drivereditvalues->email;
            $description = $drivereditvalues->description;
            $businessurl = $drivereditvalues->businessurl;
            $addressline1 = $drivereditvalues->addressline1;
            $addressline2 = $drivereditvalues->addressline2;
            $town = $drivereditvalues->town;
            $county = $drivereditvalues->county;
            $postcode = $drivereditvalues->postcode;


            if ($request->status == 1) {

                $data = array(
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'phone' => $phone,
                    'email' => $email,
                    'description' => $description,
                    'businessurl' => $businessurl,
                    'addressline1' => $addressline1,
                    'addressline2' => $addressline2,
                    'town' => $town,
                    'county' => $county,
                    'postcode' => $postcode,
                );
                $find_query = Driver::find($driverid);




                $find_query->update($data);
                $endStatus = 1;
            } else {


                $create_data = array(
                    'messageid' => $request->message_id,
                    'driverid' => $driverid,
                    'messagestatus' => 0,
                    'messagedatetime' => $current->toDateTimeString(),

                );
                DriverMessage::create($create_data);
            }

            $update_licenseid_data = array(
                'approved' => $request->status,
                'approvedbyadminid' => $request->approvedbyadminid,
                'approveddatetime' => $current->toDateTimeString(),

            );

            $find_query = DriverEdit::find($driverid);
            $find_query->update($update_licenseid_data);
            $endStatus = 1;
            DB::commit();
            $mailstatus = $request->status == 1 ? 'approved' : 'rejected';


            /*+++++++++++++Email Start Code ++++++++++++++++++*/
            $driver_info = Driver::where('driverid', $find_query->driverid)->first();
            $mailTo = $driver_info->email;

            $subject = 'Your request to update Account Details has been: ' . $mailstatus . '.';
            Mail::send(
                'email.licensereject',
                [
                    'name' => $driver_info->firstname,
                    'mailTo' => $mailTo,
                    'subject' => $subject,

                ],
                function ($message) use ($mailTo, $subject) {
                    $message->to($mailTo)
                        ->subject($subject);

                }
            );
            /*+++++++++++++Email End Code ++++++++++++++++++*/

        } catch (\Exception $e) {
            $exception = $e->getMessage();
            DB::rollback();
            $endStatus = 0;
        }
        if ($endStatus == 1) {
            $res = array(
                'status' => 1,
                'message' => 'Status Successfully',
                'alert_class' => 'alert-success',
                'alert_message' => 'Revoked Successfully',
                'exception' => $exception
            );
        } else {
            $res = array(
                'status' => 2,
                'message' => 'Un-Successful Operation',
                'alert_class' => 'alert-danger',
                'alert_message' => 'Un-Successful Operation',
                'exception' => $exception
            );
        }
        return response()->json($res);



    }


    public function changeHistoryStatus(Request $request)
    {


        $current = Carbon::now();

        $licenseeditid = $request->licenseeditid;

        $licenseeditvalues = LicenseEdit::where('licenseeditid', $licenseeditid)->first();
        DB::beginTransaction();
        $exception = "";
        try {
            $rules = array(
                'licenseeditid' => 'required',
                'status' => 'required',

            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $res = array(
                    'status' => 2,
                    'message' => 'Validator Failed',
                    'alert_class' => 'alert-danger',
                    'alert_message' => 'Validation Failed! Some Required parameters missing!',
                    'errors' => $validator->errors()
                );
                return response()->json($res);
            } //validator fails
            if ($licenseeditvalues->approved != 0) {
                throw ValidationException::withMessages(['approved' => 'Edit approved status is already non zero. Cannot change status']);
            }
            $licensephoto = $licenseeditvalues->licensephoto;
            $licensenumber = $licenseeditvalues->licensenumber;
            $licenseexpiry = $licenseeditvalues->licenseexpiry;
            $driverid = $licenseeditvalues->driverid;

            if ($request->status == 1) {

                $data = array(
                    'licensephoto' => $licensephoto,
                    'licensenumber' => $licensenumber,
                    'licenseexpiry' => $licenseexpiry,
                );
                $find_query = License::find($driverid);
                $find_query->update($data);
                $endStatus = 1;
            } else {


                $create_data = array(
                    'messageid' => $request->message_id,
                    'driverid' => $driverid,
                    'messagestatus' => 0,
                    'messagedatetime' => $current->toDateTimeString(),

                );
                DriverMessage::insertOrIgnore($create_data);
            }

            $update_licenseid_data = array(
                'approved' => $request->status,
                'approvedbyadminid' => $request->approvedbyadminid,
                'approveddatetime' => $current->toDateTimeString(),

            );

            $find_query = LicenseEdit::find($licenseeditid);
            $find_query->update($update_licenseid_data);
            $endStatus = 1;
            DB::commit();
            $mailstatus = $request->status == 1 ? 'approved' : 'rejected';


            /*+++++++++++++Email Start Code ++++++++++++++++++*/
            $driver_info = Driver::where('driverid', $find_query->driverid)->first();
            $mailTo = $driver_info->email;

            $subject = 'Your request to update License Details has been: ' . $mailstatus . '.';
            Mail::send(
                'email.licensereject',
                [
                    'name' => $driver_info->username,
                    'mailTo' => $mailTo,
                    'subject' => $subject,
                    // 'submissionTime' => $licenseeditvalues->licenseeditdatetime

                ],
                function ($message) use ($mailTo, $subject) {
                    $message->to($mailTo)
                        ->subject($subject);

                }
            );
            /*+++++++++++++Email End Code ++++++++++++++++++*/


        } catch (\Exception $e) {
            $exception = $e->getMessage();
            DB::rollback();
            $endStatus = 0;
        }




        if ($endStatus == 1) {
            $res = array(
                'status' => 1,
                'message' => 'Status Successfully',
                'alert_class' => 'alert-success',
                'alert_message' => 'Revoked Successfully',
                'exception' => $exception
            );
        } else {
            $res = array(
                'status' => 2,
                'message' => 'Un-Successful Operation',
                'alert_class' => 'alert-danger',
                'alert_message' => 'Un-Successful Operation',
                'exception' => $exception
            );
        }
        return response()->json($res);


    }


    public function changeStatus(Request $request)
    {

        DB::beginTransaction();
        $exception = "";
        try {
            $rules = array(
                'licenseeditid' => 'required',
                'status' => 'required',

            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $res = array(
                    'status' => 2,
                    'message' => 'Validator Failed',
                    'alert_class' => 'alert-danger',
                    'alert_message' => 'Validation Failed! Some Required parameters missing!',
                    'errors' => $validator->errors()
                );
                return response()->json($res);
            }

            $licenseeditid = $request->input('licenseeditid');
            $status = $request->input('status');
            //$driver = auth()->guard('driveruser')->user();
            //$driverid=$driver->driverid;

            $data = array(
                'approved' => $status,
            );
            $find_query = LicenseEdit::find($licenseeditid);
            $find_query->update($data);
            $endStatus = 1;
            DB::commit();
        } catch (\Exception $e) {
            $exception = $e->getMessage();
            DB::rollback();
            $endStatus = 0;
        }
        if ($endStatus == 1) {
            $res = array(
                'status' => 1,
                'message' => 'Revoked Successfully',
                'alert_class' => 'alert-success',
                'alert_message' => 'Revoked Successfully',
                'exception' => $exception
            );
        } else {
            $res = array(
                'status' => 2,
                'message' => 'Un-Successful Operation',
                'alert_class' => 'alert-danger',
                'alert_message' => 'Un-Successful Operation',
                'exception' => $exception
            );
        }
        return response()->json($res);


    }

    public function getListing3(Request $request)
    {
        $orderArray = array(
            '0' => 'id',
            '1' => 'firstname',
            '2' => 'lastname',
            '3' => 'phone',
            '4' => 'email',
            '5' => 'description',
            '6' => 'businessurl',
            '7' => 'addressline1',
            '8' => 'addressline2',
            '9' => 'town',
            '10' => 'county',
            '11' => 'postcode',
            '12' => 'approveddatetime',
            '13' => 'approved',
            '14' => 'drivereditdatetime',
        );
        $where = array();
        $datatableForm = $this->getDatatableData($request->all());
        $driver = auth()->guard('driveruser')->user();
        $driverid = $driver->driverid;

        //$driver->load(['photo', 'calls.location', 'payments', 'license', 'messages']);

        $where[] = ['driverid', '=', $driverid];
        $where[] = ['approved', '=', '0'];
        /*if($request->input('name')){
            $where[]=['name','LIKE','%'.$request->input('name').'%'];
        }*/
        $query = DriverEdit::where($where);

        $queryCloneObj = clone $query;
        $totalCount = $queryCloneObj->count();
        $query = clone $query;

        $query = $query
            ->orderBy($orderArray[$datatableForm['orderColumn']], $datatableForm['orderMethod'])
            ->skip($datatableForm['offset'])
            ->take($datatableForm['length'])
            ->get();
        //->toarray();

        $result = array("data" => array());
        $i = 1;

        foreach ($query as $key => $value) {

            /*
            0=pending;
            1=approved;
            2=rejected;
            3=revoked
            */
            $firstname = $value->firstname;
            $lastname = $value->lastname;
            $phone = $value->phone;
            $email = $value->email;

            $description = substr($value->description, 0, 10);
            $businessurl = $value->businessurl;
            $addressline1 = $value->addressline1;
            $addressline2 = $value->addressline2;

            $town = $value->town;
            $county = $value->county;
            $postcode = $value->postcode;

            $approved_by_admin = '<span style="color:red">Pending</span>';

            $edit_date = $value->drivereditdatetime;
            if (trim($value->approveddatetime) == '1000-01-01 00:00:00') {
                $approved_date = 'NA';
            } else {
                $approved_date = $value->approveddatetime;
            }
            if ($value->approved == '0') {
                $approved_by_admin = '<span style="color:red">Pending</span>';
            } elseif ($value->approved == '1') {
                $approved_by_admin = '<span style="color:green">Approved</span>';
            } elseif ($value->approved == '2') {
                $approved_by_admin = '<span style="color:red">Rejected</span>';
            } elseif ($value->approved == '3') {
                $approved_by_admin = '<span style="color:red">Revoked</span>';
            } else {
                $approved_by_admin = '<span style="color:red">Pending</span>';
            }

            $revoke_btn = '<button class="btn btn-primary change-status-driver-btn" data-drivereditid="' . $value->drivereditid . '" data-status="3">Cancel Request</button>';


            $result["data"][$key] = array(
                $i++,
                $firstname,
                $lastname,
                $phone,
                $email,
                $description,
                $businessurl,
                $addressline1,
                $addressline2,
                $town,
                $county,
                $postcode,
                $approved_date,
                $approved_by_admin,
                $edit_date,
                $revoke_btn,
            );


        }

        $newData = array(
            'draw' => $datatableForm['draw'],
            'recordsTotal' => $totalCount,
            'recordsFiltered' => $totalCount,
            'data' => $result["data"]
        );

        return $newData;

    }

    public function getListing4(Request $request)
    {

        $orderArray = array(
            '0' => 'id',
            '1' => 'firstname',
            '2' => 'lastname',
            '3' => 'phone',
            '4' => 'email',
            '5' => 'description',
            '6' => 'businessurl',
            '7' => 'addressline1',
            '8' => 'addressline2',
            '9' => 'town',
            '10' => 'county',
            '11' => 'postcode',
            '12' => 'approveddatetime',
            '13' => 'approved',
            '14' => 'drivereditdatetime',
        );
        $where = array();
        $datatableForm = $this->getDatatableData($request->all());
        $driver = auth()->guard('driveruser')->user();
        $driverid = $driver->driverid;

        //$driver->load(['photo', 'calls.location', 'payments', 'license', 'messages']);

        $where[] = ['driverid', '=', $driverid];
        $where[] = ['approved', '!=', '0'];
        /*if($request->input('name')){
            $where[]=['name','LIKE','%'.$request->input('name').'%'];
        }*/
        $query = DriverEdit::where($where);

        $queryCloneObj = clone $query;
        $totalCount = $queryCloneObj->count();
        $query = clone $query;

        $query = $query
            ->orderBy($orderArray[$datatableForm['orderColumn']], $datatableForm['orderMethod'])
            ->skip($datatableForm['offset'])
            ->take($datatableForm['length'])
            ->get();
        //->toarray();

        $result = array("data" => array());
        $i = 1;

        foreach ($query as $key => $value) {

            /*
            0=pending;
            1=approved;
            2=rejected;
            3=revoked
            */
            $firstname = $value->firstname;
            $lastname = $value->lastname;
            $phone = $value->phone;
            $email = $value->email;

            $description = substr($value->description, 0, 10);
            $businessurl = $value->businessurl;
            $addressline1 = $value->addressline1;
            $addressline2 = $value->addressline2;

            $town = $value->town;
            $county = $value->county;
            $postcode = $value->postcode;

            $approved_by_admin = '<span style="color:red">Pending</span>';

            $edit_date = $value->drivereditdatetime;
            if (trim($value->approveddatetime) == '1000-01-01 00:00:00') {
                $approved_date = 'NA';
            } else {
                $approved_date = $value->approveddatetime;
            }
            if ($value->approved == '0') {
                $approved_by_admin = '<span style="color:red">Pending</span>';
            } elseif ($value->approved == '1') {
                $approved_by_admin = '<span style="color:green">Approved</span>';
            } elseif ($value->approved == '2') {
                $approved_by_admin = '<span style="color:red">Rejected</span>';
            } elseif ($value->approved == '3') {
                $approved_by_admin = '<span style="color:red">Revoked</span>';
            } else {
                $approved_by_admin = '<span style="color:red">Pending</span>';
            }

            $revoke_btn = '<button class="btn btn-primary change-status-driver-btn" data-drivereditid="' . $value->drivereditid . '" data-status="3">Revoke</button>';


            $result["data"][$key] = array(
                $i++,
                $firstname,
                $lastname,
                $phone,
                $email,
                $description,
                $businessurl,
                $addressline1,
                $addressline2,
                $town,
                $county,
                $postcode,
                $approved_date,
                $approved_by_admin,
                $edit_date,
                $revoke_btn,
            );


        }

        $newData = array(
            'draw' => $datatableForm['draw'],
            'recordsTotal' => $totalCount,
            'recordsFiltered' => $totalCount,
            'data' => $result["data"]
        );

        return $newData;


    }


    //this function is changing status of driver details edit
    public function changeStatusDriver(Request $request)
    {

        DB::beginTransaction();
        $exception = "";
        try {
            $rules = array(
                'drivereditid' => 'required',
                'status' => 'required',

            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $res = array(
                    'status' => 2,
                    'message' => 'Validator Failed',
                    'alert_class' => 'alert-danger',
                    'alert_message' => 'Validation Failed! Some Required parameters missing!',
                    'errors' => $validator->errors()
                );
                return response()->json($res);
            }

            $drivereditid = $request->input('drivereditid');
            $status = $request->input('status');
            //$driver = auth()->guard('driveruser')->user();
            //$driverid=$driver->driverid;

            $data = array(
                'approved' => $status,
            );
            $find_query = DriverEdit::find($drivereditid);
            $find_query->update($data);
            $endStatus = 1;
            DB::commit();
        } catch (\Exception $e) {
            $exception = $e->getMessage();
            DB::rollback();
            $endStatus = 0;
        }
        if ($endStatus == 1) {
            $res = array(
                'status' => 1,
                'message' => 'Cancelled Successfully',
                'alert_class' => 'alert-success',
                'alert_message' => 'Cancelled Successfully',
                'exception' => $exception
            );
        } else {
            $res = array(
                'status' => 2,
                'message' => 'Un-Successful Operation',
                'alert_class' => 'alert-danger',
                'alert_message' => 'Un-Successful Operation',
                'exception' => $exception
            );
        }
        return response()->json($res);


    }
    public function getListing5(Request $request)
    {

        $orderArray = array(
            '0' => 'id',
            '1' => 'photo',
            '2' => 'approved',
            '3' => 'approveddatetime',
           
          
        );
        $where = array();
        $datatableForm = $this->getDatatableData($request->all());
        $driver = auth()->guard('driveruser')->user();
        $driverid = $driver->driverid;

        //$driver->load(['photo', 'calls.location', 'payments', 'license', 'messages']);

        $where[] = ['driverid', '=', $driverid];
        $where[] = ['approved', '=', '0'];
        /*if($request->input('name')){
            $where[]=['name','LIKE','%'.$request->input('name').'%'];
        }*/
        $query = EditDriverPhoto::where($where);

        $queryCloneObj = clone $query;
        $totalCount = $queryCloneObj->count();
        $query = clone $query;

        $query = $query
            ->orderBy($orderArray[$datatableForm['orderColumn']], $datatableForm['orderMethod'])
            ->skip($datatableForm['offset'])
            ->take($datatableForm['length'])
            ->get();
        //->toarray();

        $result = array("data" => array());
        $i = 1;

        foreach ($query as $key => $value) {

            /*
            0=pending;
            1=approved;
            2=rejected;
            3=revoked
            */
            //$driversphoto = $value->driversphoto;
            $approved = $value->approved;
          


            $approved_by_admin = '<span style="color:red">Pending</span>';

            $edit_date = $value->photoeditdatetime;
            if (trim($value->approveddatetime) == '1000-01-01 00:00:00') {
                $approved_date = 'NA';
            } else {
                $approved_date = $value->approveddatetime;
            }
            if ($value->approved == '0') {
                $approved_by_admin = '<span style="color:red">Pending</span>';
            } elseif ($value->approved == '1') {
                $approved_by_admin = '<span style="color:green">Approved</span>';
            } elseif ($value->approved == '2') {
                $approved_by_admin = '<span style="color:red">Rejected</span>';
            } elseif ($value->approved == '3') {
                $approved_by_admin = '<span style="color:red">Revoked</span>';
            } else {
                $approved_by_admin = '<span style="color:red">Pending</span>';
            }


            $driversphoto = '';
            $driversphoto = '<img src="data:image/png;base64,' . htmlspecialchars($value->driversphoto) . '" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded-3 user-profile-img" />';

            $revoke_btn = '<button class="btn btn-primary change-status-profile-img-btn" data-photoeditid="' . $value->photoeditid . '" data-status="3">Revoke</button>';


            $result["data"][$key] = array(
                $i++,
                $driversphoto,
                $approved_date,
                $approved_by_admin,
                $edit_date,
                '',
                $revoke_btn
               
            );


        }

        $newData = array(
            'draw' => $datatableForm['draw'],
            'recordsTotal' => $totalCount,
            'recordsFiltered' => $totalCount,
            'data' => $result["data"]
        );

        return $newData;


    }
    public function getListing6(Request $request)
    {

        $orderArray = array(
            '0' => 'id',
            '1' => 'photo',
            '2' => 'approved',
            '3' => 'approveddatetime',
           
          
        );
        $where = array();
        $datatableForm = $this->getDatatableData($request->all());
        $driver = auth()->guard('driveruser')->user();
        $driverid = $driver->driverid;

        //$driver->load(['photo', 'calls.location', 'payments', 'license', 'messages']);

        $where[] = ['driverid', '=', $driverid];
        $where[] = ['approved', '!=', '0'];
        /*if($request->input('name')){
            $where[]=['name','LIKE','%'.$request->input('name').'%'];
        }*/
        $query = EditDriverPhoto::where($where);

        $queryCloneObj = clone $query;
        $totalCount = $queryCloneObj->count();
        $query = clone $query;

        $query = $query
            ->orderBy($orderArray[$datatableForm['orderColumn']], $datatableForm['orderMethod'])
            ->skip($datatableForm['offset'])
            ->take($datatableForm['length'])
            ->get();
        //->toarray();

        $result = array("data" => array());
        $i = 1;

        foreach ($query as $key => $value) {

            /*
            0=pending;
            1=approved;
            2=rejected;
            3=revoked
            */
            //$driversphoto = $value->driversphoto;
            $approved = $value->approved;
          


            $approved_by_admin = '<span style="color:red">Pending</span>';

            $edit_date = $value->photoeditdatetime;
            if (trim($value->approveddatetime) == '1000-01-01 00:00:00') {
                $approved_date = 'NA';
            } else {
                $approved_date = $value->approveddatetime;
            }
            if ($value->approved == '0') {
                $approved_by_admin = '<span style="color:red">Pending</span>';
            } elseif ($value->approved == '1') {
                $approved_by_admin = '<span style="color:green">Approved</span>';
            } elseif ($value->approved == '2') {
                $approved_by_admin = '<span style="color:red">Rejected</span>';
            } elseif ($value->approved == '3') {
                $approved_by_admin = '<span style="color:red">Revoked</span>';
            } else {
                $approved_by_admin = '<span style="color:red">Pending</span>';
            }


            $driversphoto = '';
            $driversphoto = '<img src="data:image/png;base64,' . htmlspecialchars($value->driversphoto) . '" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded-3 user-profile-img" />';

            $revoke_btn = '<button class="btn btn-primary change-status-profile-img-btn" data-photoeditid="' . $value->photoeditid . '" data-status="3">Revoke</button>';


            $result["data"][$key] = array(
                $i++,
                $driversphoto,
                $approved_date,
                $approved_by_admin,
                $edit_date,
                '',
               
            );


        }

        $newData = array(
            'draw' => $datatableForm['draw'],
            'recordsTotal' => $totalCount,
            'recordsFiltered' => $totalCount,
            'data' => $result["data"]
        );

        return $newData;


    }

    //this function is changing status of driver details edit
    public function changeStatusProfileImage(Request $request)
    {

        DB::beginTransaction();
        $exception = "";
        try {
            $rules = array(
                'photoeditid' => 'required',
                'status' => 'required',

            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $res = array(
                    'status' => 2,
                    'message' => 'Validator Failed',
                    'alert_class' => 'alert-danger',
                    'alert_message' => 'Validation Failed! Some Required parameters missing!',
                    'errors' => $validator->errors()
                );
                return response()->json($res);
            }

            $photoeditid = $request->input('photoeditid');
            $status = $request->input('status');
            //$driver = auth()->guard('driveruser')->user();
            //$driverid=$driver->driverid;

            $data = array(
                'approved' => $status,
            );
            $find_query = EditDriverPhoto::find($photoeditid);
            $find_query->update($data);
            $endStatus = 1;
            DB::commit();
        } catch (\Exception $e) {
            $exception = $e->getMessage();
            DB::rollback();
            $endStatus = 0;
        }
        if ($endStatus == 1) {
            $res = array(
                'status' => 1,
                'message' => 'Cancelled Successfully',
                'alert_class' => 'alert-success',
                'alert_message' => 'Cancelled Successfully',
                'exception' => $exception
            );
        } else {
            $res = array(
                'status' => 2,
                'message' => 'Un-Successful Operation',
                'alert_class' => 'alert-danger',
                'alert_message' => 'Un-Successful Operation',
                'exception' => $exception
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

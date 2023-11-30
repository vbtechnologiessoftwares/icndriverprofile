<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\DriverMessage;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Hash;
use DB;
use App\Models\Driver;
use App\Models\Licenseauthoritymaster;
use App\Models\DriverEdit;
use App\Models\LicenseEdit;
use App\Models\DriverLocation;
use App\Models\License;
use App\Models\DriverPhoto;
use Validator;
use Mail;

class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('auth.registration');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        /*dd($request);*/
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $user = \App\Models\Driver::where([
            'email' => $request->email,
            'password' => md5($request->password)
        ])->first();



        if ($user) {
            Auth::guard('driveruser')->login($user);
            //print_r(Auth::guard('driveruser')->user());die;
            //return redirect('dashboard')->withSuccess('You have Successfully loggedin');
            echo '';
            return redirect()->route('dashboard');
        }


        return redirect()->back()->withErrors(['invalid' => 'Oops! You have entered invalid credentials']);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
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

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }

    public function toggleDutyStatus(Request $request)
    {
        $data = $request->validate(['action' => 'required|in:on,off']);
        $driver = auth()->user();
        $driver->dutystatus = $data['action'] == "on" ? 1 : 0;
        $driver->save();

        return response()->json([
            'status' => 'success',
            'message' => "Status updated",
        ]);

    }

    public function markMessageAsSeen(DriverMessage $driverMessage)
    {
        $driver = auth()->user();

        if ( $driverMessage->driverid != $driver->driverid ){
            abort(403);
        }

        $driverMessage->messagestatus = 1;
        $driverMessage->save();

        return response()->json([
            'status' => true,
            'message' => "Messages marked as seen",
        ]);
    }



    public function driverRegistrationForm()
    {
        


$licenseauthoritymaster = Licenseauthoritymaster::get();


        //$data['locations']=array();
        return view('drivers.signup', compact('licenseauthoritymaster'));

    }
    public function driverRegistrationFormStore(Request $request)
    {
        /*dd($request);*/

        DB::beginTransaction();
        $exception="";
        try{
            $rules = array(
                'firstname' => 'required',
                'lastname' => 'required',
                /*'licenseauthority_master' => 'required',*/

                
              /*  'username' => 'required|unique:driver_details,username',*/
                'phone_number' => 'required',
                'email' => 'required|unique:driver_details,email',
                
                'addressline1'=>'required',
                'town'=>'required',
                'county'=>'required',
                'postcode'=>'required',

            /*    '4_seater_vehicle' => 'required',
                '8_seater_vehicle' => 'required',*/
                //'estate_vehicle' => 'required',
                //'courier_vehicle'=>'required',
                //'executivevehicle'=>'required',
                //'easy_access_vehicle'=>'required',
                /*'airport_runs'=>'required',*/
                /*'6seatervehicle'=>'required',*/
                /*'longdistance'=>'required',*/

                'driver_photo'=>'required',
                'driver_licence_photo'=>'required',
                'licensenumber'=>'required',
                'licenseexpiry'=>'required',
            );
            $rulesMessages=array(
                'firstname.required' => 'This field is required',
                'lastname.required' => 'This field is required',
                /*'username.required' => 'This field is required',*/
                'phone_number.required' => 'This field is required',
                'email.required' => 'This field is required',
                'business_url.required'=>'This field is required',
               
                'addressline1.required'=>'This field is required',
                'addressline2.required'=>'This field is required',
                'town.required'=>'This field is required',
                'county.required'=>'This field is required',
                'postcode.required'=>'This field is required',
               /* 'licenseauthority_master.required'=>'This field is required',*/

                /*'4_seater_vehicle.required' => 'This field is required',*/
                /*'8_seater_vehicle.required' => 'This field is required',*/
                /*'estate_vehicle.required' => 'This field is required',*/
                /*'courier_vehicle.required'=>'This field is required',*/
                /*'executivevehicle.required'=>'This field is required',*/
                //'easy_access_vehicle.required'=>'This field is required',
                /*'airport_runs.required'=>'This field is required',*/
                /*'6seatervehicle.required'=>'This field is required',*/
                /*'longdistance.required'=>'This field is required',*/

                'driver_photo.required'=>'This field is required',
                'driver_licence_photo.required'=>'This field is required',

                'licensenumber.required'=>'This field is required',
                'licenseexpiry.required'=>'This field is required',

                //'locations.required'=>'This field is required',
            );

            $four_seatervehicle=0;
            $eight_seatervehicle=0;
            $estate_vehicle=0;
            $courier_vehicle=0;
            $executivevehicle=0;
            $airport_runs=0;
            $six_seatervehicle=0;
            $longdistance=0;

             if($request->has('6seatervehicle'))
            {
                $six_seatervehicle=1;
            }if($request->has('longdistance'))
            {
                $longdistance=1;
            }

            if($request->has('4_seater_vehicle'))
            {
                $four_seatervehicle=1;
            }
            if($request->has('8_seater_vehicle'))
            {
                $eight_seatervehicle=1;
            }
            if($request->has('estate_vehicle'))
            {
                $estate_vehicle=1;
            }
            if($request->has('courier_vehicle'))
            {
                $courier_vehicle=1;
            }
            if($request->has('executivevehicle'))
            {
                $executivevehicle=1;
            }
            if($request->has('airport_runs'))
            {
                $airport_runs=1;
            }


            $validator = Validator::make($request->all(),$rules,$rulesMessages);
            if($validator->fails()){                
                $res = array(
                    'status' => 2,
                    'message' => 'Validator Failed',
                    'errors' => $validator->errors()
                );                
                return response()->json($res);
            }//validator fails
              $characters = '0123456789abcdefghijklmnopqrstuvwxyz#!&';
            $digits = 8;
            $randomValue = Str::random($digits, $characters);

            $create_data=array(
               /* 'username' => $request->input('username'),*/
                'firstname' => $request->input('firstname'),
                'lastname' => $request->input('lastname'),
                'phone' => $request->input('phone_number'),
                'email' => $request->input('email'),
                'businessurl'=>$request->input('business_url'),
                'password'=>md5($randomValue),
                'password_reset_required'=>1,
                'addressline1'=>$request->input('addressline1'),
                'addressline2'=>$request->input('addressline2'),
                'town'=>$request->input('town'),
                'county'=>$request->input('county'),
                'postcode'=>$request->input('postcode'),
                

                '4seatervehicle' => $four_seatervehicle,
                '8seatervehicle' => $eight_seatervehicle,
                'estatevehicle' => $estate_vehicle,
                'courier'=>$courier_vehicle,
                'executivevehicle'=>$executivevehicle,
                'airportruns'=>$airport_runs,
                '6seatervehicle'=>$six_seatervehicle,
                'longdistance'=>$longdistance,

                'signupdate'=>date('Y-m-d')
            );


            



            $driver_create_query=Driver::create($create_data);
            $driverid=$driver_create_query->driverid;

            if($request->has('locations'))
            {
                foreach ($request->input('locations') as $key => $value) {
                    DriverLocation::create(['driverid'=>$driverid,'locationid'=>$value]);
                }
            }



            
            $driver_photo = 
            base64_encode(
                file_get_contents(
                    $request->file('driver_photo')->path()
                )
            );

            $driver_licence_photo = 
            base64_encode(
                file_get_contents(
                    $request->file('driver_licence_photo')->path()
                )
            );
            $create_license_data=array(
                'driverid'=>$driverid,
                'licensephoto'=>$driver_licence_photo,
                'licensenumber'=>$request->input('licensenumber'),
                'licenseexpiry'=>$request->input('licenseexpiry'),
                'licenseauthority'=>$request->input('licenseauthority_master'),
            );
            License::create($create_license_data);

            $create_driver_photo_data=array(
                'driverid'=>$driverid,
                'driversphoto'=>$driver_photo
            );
            DriverPhoto::create($create_driver_photo_data);

            //edit data starts
            $edit_data=array(
                'driverid'=>$driverid,
                'firstname' => $request->input('firstname'),
                'lastname' => $request->input('lastname'),
                'phone' => $request->input('phone_number'),
                'email' => $request->input('email'),
                'businessurl'=>$request->input('business_url'),
            );
            DriverEdit::create($edit_data);
            $edit_license_data=array(
                'driverid'=>$driverid,
                'licensephoto'=>$driver_licence_photo,
                'licensenumber'=>$request->input('licensenumber'),
                'licenseexpiry'=>$request->input('licenseexpiry'),
                'licenseauthority'=>$request->input('licenseauthority_master'),
            );
            LicenseEdit::create($edit_license_data);
            //edit data ends

 $mailTo=$request->input('email');

         $subject = 'Welcome to CabDriversDirect.com';
         Mail::send('email.signup',
                [
                    'password'         => $randomValue,
                    'name'         => $request->input('firstname'),
                    'mailTo'         => $mailTo,
                ], function ($message) use ($mailTo, $subject) {
                $message->to($mailTo)
                        ->subject($subject);


             });

            
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
                'message' => 'Registered successfully',
                'alert_class' => 'alert-success',
                'alert_message' => 'Registered successfully',
                //'exception'=>$exception
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

        
        //return view('drivers.drivercreate');

    }

    public function listLocations(Request $request)
    {
        info("Request data: ". json_encode($request->all()));
        $locations = Location::query();
        if ( $request->filled('search') ){
            $locations->where('town','like', "%{$request->search}%");
        }
        return response()->json($locations->paginate(20));
    }
    public function listLocationsNear(Request $request)
    {
        if($request->has('location_near_id') && $request->location_near_id !="")
        {
            $q=Location::where('locationid',$request->location_near_id)->first();
            if($q){
                $latitude=$q->latitude;
                $longitude=$q->longitude;
                $distance=$request->distance;
                $a=Location::selectRaw(
                    "*,
                    ( 6371 * 
                        ACOS( 
                            COS( RADIANS( latitude ) ) * 
                            COS( RADIANS( $latitude ) ) * 
                            COS( RADIANS( $longitude ) - 
                            RADIANS( longitude ) ) + 
                            SIN( RADIANS( latitude ) ) * 
                            SIN( RADIANS( $latitude ) ) 
                        ) 
                    ) AS distance
                ")
                ->having('distance','<=',$distance)
                ->orderBy('distance','asc');
                return response()->json($a->paginate(40));
            }else{
                return response()->json(array());
            }  
        }
        else{
            return response()->json(array());
        }
    }

    public function checkIfEmailExists(Request $request){
        $check_count=Driver::where('email',$request->email)->count();
        if($check_count>0)
        {            
            return 'false';
        }else{
            return 'true';
        }
    }
    public function checkIfUsernameExists(Request $request){
        $check_count=Driver::where('username',$request->username)->count();
        if($check_count>0)
        {            
            return 'false';
        }else{
            return 'true';
        }
    }
}

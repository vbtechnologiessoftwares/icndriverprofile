<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\DriverMessage;
use App\Models\Location;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Hash;
use DB;
use App\Models\Driver;
use App\Models\DriverLocation;
use App\Models\License;
use App\Models\DriverPhoto;
use Validator;


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
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $user = \App\Models\Driver::where([
            'username' => $request->username,
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
        //$data['locations']=array();
        return view('drivers.signup');

    }
    public function driverRegistrationFormStore(Request $request)
    {
        //dd($request->all());

        DB::beginTransaction();
        $exception="";
        try{
            $rules = array(
                'username' => 'required',
                'phone_number' => 'required',
                'email' => 'required',
                'business_url'=>'required',
                'password'=>'required',

                '4_seater_vehicle' => 'required',
                '8_seater_vehicle' => 'required',
                'estate_vehicle' => 'required',
                'courier_vehicle'=>'required',
                'easy_access_vehicle'=>'required',
                'airport_runs'=>'required',

                'driver_photo'=>'required',
                'driver_licence_photo'=>'required',

                //'locations'=>'required',


            );
            $rulesMessages=array(
                'username.required' => 'This field is required',
                'phone_number.required' => 'This field is required',
                'email.required' => 'This field is required',
                'business_url.required'=>'This field is required',
                'password.required'=>'This field is required',

                '4_seater_vehicle.required' => 'This field is required',
                '8_seater_vehicle.required' => 'This field is required',
                'estate_vehicle.required' => 'This field is required',
                'courier_vehicle.required'=>'This field is required',
                'easy_access_vehicle.required'=>'This field is required',
                'airport_runs.required'=>'This field is required',

                'driver_photo.required'=>'This field is required',
                'driver_licence_photo.required'=>'This field is required',

                //'locations.required'=>'This field is required',
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

            $create_data=array(

                'username' => $request->input('username'),
                'phone' => $request->input('phone_number'),
                'email' => $request->input('email'),
                'businessurl'=>$request->input('business_url'),
                'password'=>md5($request->input('password')),

                '4seatervehicle' => $request->input('4_seater_vehicle'),
                '8seatervehicle' => $request->input('8_seater_vehicle'),
                'estatevehicle' => $request->input('estate_vehicle'),
                'courier'=>$request->input('courier_vehicle'),
                'easyaccessvehicle'=>$request->input('easy_access_vehicle'),
                'airportruns'=>$request->input('airport_runs'),

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
            //base64_encode(
                file_get_contents(
                    $request->file('driver_photo')->path()
                );
            //);

            $driver_licence_photo = 
            //base64_encode(
                file_get_contents(
                    $request->file('driver_licence_photo')->path()
                );
            //);
            $create_license_data=array(
                'driverid'=>$driverid,
                'licensephoto'=>$driver_licence_photo
            );
            License::create($create_license_data);

            $create_driver_photo_data=array(
                'driverid'=>$driverid,
                'driversphoto'=>$driver_photo
            );
            DriverPhoto::create($create_driver_photo_data);

            
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
                //'exception'=>$exception
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
}

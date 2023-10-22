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
}

<?php 
  
namespace App\Http\Controllers; 
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use DB; 
use Carbon\Carbon; 
use App\Models\Driver; 
use Mail; 
use Hash;
use Illuminate\Support\Str;
  
class ChangePasswordController extends Controller
{
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function index()
      {
        $data=array();
        $driver = auth()->guard('driveruser')->user();
        $data['driver']=$driver;
         return view('drivers.change_password')->with($data);
      }

      public function store(Request $request)
      {
        DB::beginTransaction();
        $exception="";
        try{
            $request->validate([
                'old_password' => 'required',
                'new_password' => 'required|confirmed',
            ]);

            $driver = auth()->guard('driveruser')->user();



            #Match The Old Password
            if($driver->password!=md5($request->old_password))
            {
              return back()->with("error_message", "Old Password Doesn't match!");
            }
            /*if(!Hash::check($request->old_password, auth()->user()->password)){
                return back()->with("error", "Old Password Doesn't match!");
            }*/

            #Update the new Password
            Driver::where('driverid',$driver->driverid)->update([
                'password' => md5($request->new_password),
                'password_reset_required' => 0
            ]);

            $endStatus=1;
            DB::commit();
            return back()->with("message", "Password changed successfully!");
        }catch(\Exception $e){
            $exception=$e->getMessage();
            DB::rollback();
            $endStatus=0;
            return back()->with("error_message", "Something went wrong!");
        }
      }
}
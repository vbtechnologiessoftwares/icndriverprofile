<?php

use Illuminate\Support\Facades\Route;

  
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\AutoController;
use App\Http\Controllers\HelthController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EditHistoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\DutyController;
use App\Http\Controllers\CronController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');

Route::get('/signup', [ AuthController::class, 'driverRegistrationForm'])->name('driver_signup');
Route::post('/signup', [ AuthController::class, 'driverRegistrationFormStore'])->name('driver_signup.store');

//Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth:driveruser'); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');



Route::post('contactus', [ContactusController::class, 'store'])->name('contactus');
Route::get('contactusindex', [ContactusController::class, 'contactusindex'])->name('contactusindex');
Route::get('contactusshow/{id}', [ContactusController::class, 'contactusshow'])->name('contactus.show');

Route::get('terms', [ContactusController::class, 'terms'])->name('terms');
Route::get('privacy', [ContactusController::class, 'policy'])->name('policy');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Route::get('/list-locations', [ AuthController::class, 'listLocations'])->name('guest_locations.list');
Route::get('/list-locations-near', [ AuthController::class, 'listLocationsNear'])->name('guest_locations.listnear');
Route::get('/check-if-email-exists', [ AuthController::class, 'checkIfEmailExists'])->name('driver_signup.check_if_email_exists');
Route::get('/check-if-username-exists', [ AuthController::class, 'checkIfUsernameExists'])->name('driver_signup.check_if_username_exists');


Route::prefix('cron')->group( function(){
	Route::get('/turn-off-duty', [CronController::class, 'turnOffDuty']);
});

Route::get('/change-history-status', [ EditHistoryController::class, 'changeHistoryStatus'])
	    ->name('changeHistoryStatus');

Route::get('/change-profile', [ EditHistoryController::class, 'changeprofile'])
	    ->name('changeprofile');

Route::get('/signup/review', [ EditHistoryController::class, 'driversinupinfo'])
	    ->name('driversinupinfo');



Route::middleware('auth:driveruser')->group( function(){

    //Route::post('/change-duty-status', [AuthController::class, 'toggleDutyStatus'])->name('change-duty-status');
    Route::prefix('duty')->group( function(){
    	Route::get('/hours', [DutyController::class, 'openHoursModal'])->name('duty.hours');
    	Route::post('/hours/update', [DutyController::class, 'hoursUpdate'])->name('duty.hours.update');
    	Route::post('/change-duty-status', [DutyController::class, 'toggleDutyStatus'])->name('duty.changeStatus');
    	Route::get('/get-driver-duty-status', [DutyController::class, 'getDriverDutyStatus'])->name('duty.get_driver_duty_status');
    	
    });
    


    Route::get('/messages/seen/{driver_message}', [ AuthController::class, 'markMessageAsSeen'])->name('messages.mark-as-seen');
	Route::get('/locations', [ ProfileController::class, 'listLocations'])->name('locations.list');
	Route::get('/locations-near', [ ProfileController::class, 'listLocationsNear'])->name('locations.listnear');
	
	Route::post('/locations', [ ProfileController::class, 'storeLocations'])->name('locations.store');
	Route::post('/locations/delete', [ ProfileController::class, 'deleteLocations'])->name('locations.delete');

    //license route group starts
    Route::prefix('license')->group( function(){    
	    Route::get('/edit', [ LicenseController::class, 'edit'])
	    ->name('license.edit');
	    Route::post('/update', [ LicenseController::class, 'update'])
	    ->name('license.update');
	});
	//license route group ends
	//edit history route group starts
    Route::prefix('change-applications')->group( function(){    
	    Route::get('/', [ EditHistoryController::class, 'index'])
	    ->name('edit_history');
	    Route::post('/listing', [ EditHistoryController::class, 'getListing'])
	    ->name('edit_history.listing');
	    Route::post('/listing2', [ EditHistoryController::class, 'getListing2'])
	    ->name('edit_history.listing2');
	    Route::post('/change-status', [ EditHistoryController::class, 'changeStatus'])
	    ->name('edit_history.change_status');

	    Route::post('/listing3', [ EditHistoryController::class, 'getListing3'])
	    ->name('edit_history.listing3');
	    Route::post('/listing4', [ EditHistoryController::class, 'getListing4'])
	    ->name('edit_history.listing4');
	     Route::post('/listing5', [ EditHistoryController::class, 'getListing5'])
	    ->name('edit_history.listing5');
	    Route::post('/listing6', [ EditHistoryController::class, 'getListing6'])
	    ->name('edit_history.listing6');
	    Route::post('/change-status-driver', [ EditHistoryController::class, 'changeStatusDriver'])
	    ->name('edit_history.change_status_driver');
	    

	    
	});
	//edit history route group ends

	//dashboard route group starts
    Route::prefix('dashboard')->group( function(){    
	    Route::get('/', [ DashboardController::class, 'index'])
	    ->name('dashboard');	    
	    Route::get('/edit-profile-image', [ DashboardController::class, 'editProfileImage'])
	    ->name('dashboard.editprofileimage');
	    Route::post('/update-profile-image', [ DashboardController::class, 'updateProfileImage'])
	    ->name('dashboard.updateprofileimage');
	    Route::get('/get-offtime', [ DashboardController::class, 'getOffTime'])
	    ->name('dashboard.get_off_time');

	    Route::get('/edit-driver', [ DashboardController::class, 'editDriver'])
	    ->name('dashboard.editdriver');
	    Route::post('/update-driver', [ DashboardController::class, 'updateDriver'])
	    ->name('dashboard.updatedriver');
	});
	//dashboard route group ends

	//change password route group starts
    Route::prefix('change-password')->group( function(){    
	    Route::get('/', [ ChangePasswordController::class, 'index'])
	    ->name('change_password');	    
	    Route::post('/save', [ ChangePasswordController::class, 'store'])
	    ->name('change_password.store');
	});
	//change password route group ends

	//messages route group starts
    Route::prefix('messages')->group( function(){    
	    Route::get('/', [ MessageController::class, 'index'])
	    ->name('messages');	    
	    Route::post('/listing', [ MessageController::class, 'getListing'])
	    ->name('messages.listing');
	});
	//messages route group ends


	
});//middleware auth driver group 


/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [AuthController::class, 'index']);


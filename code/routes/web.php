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

Route::middleware('auth:driveruser')->group( function(){

    Route::get('/change-duty-status', [AuthController::class, 'toggleDutyStatus'])->name('change-duty-status');
    Route::get('/messages/seen/{driver_message}', [ AuthController::class, 'markMessageAsSeen'])->name('messages.mark-as-seen');
	Route::get('/locations', [ ProfileController::class, 'listLocations'])->name('locations.list');
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
	});
	//edit history route group ends

	//dashboard route group starts
    Route::prefix('dashboard')->group( function(){    
	    Route::get('/', [ DashboardController::class, 'index'])
	    ->name('dashboard');
	    
	    Route::get('/edit-profile', [ DashboardController::class, 'editProfile'])
	    ->name('dashboard.editprofile');
	    Route::post('/update-profile', [ DashboardController::class, 'updateProfile'])
	    ->name('dashboard.updateprofile');
	    
	    

	});
	//dashboard route group ends

	//dashboard route group starts
    Route::prefix('change-password')->group( function(){    
	    Route::get('/', [ ChangePasswordController::class, 'index'])
	    ->name('change_password');
	    
	    Route::post('/save', [ ChangePasswordController::class, 'store'])
	    ->name('change_password.store');
	    
	    

	});
	//dashboard route group ends

	
});





/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [AuthController::class, 'index']);


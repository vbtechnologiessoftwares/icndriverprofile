<?php

use Illuminate\Support\Facades\Route;

  
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AutoController;
use App\Http\Controllers\HelthController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EditHistoryController;

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

Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth:driveruser'); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

/*Route::get('auto_index', [AutoController::class, 'index'])->name('auto.index')->middleware('auth');
Route::get('auto_show/{id}', [AutoController::class, 'show'])->name('auto.show')->middleware('auth');
Route::post('autosubmit', [AutoController::class, 'autosubmit'])->name('auto.autosubmit');
Route::get('auto-coverage', [AutoController::class, 'autocoverage'])->name('auto-coverage');
Route::get('testing', [AutoController::class, 'testing'])->name('testing');
Route::post('testingsub', [AutoController::class, 'testingsub'])->name('testingsub');
Route::post('testingsubsub', [AutoController::class, 'testingsubsub'])->name('testingsubsub');
Route::post('testingsubsubvin', [AutoController::class, 'testingsubsubvin'])->name('testingsubsubvin');*/

/*Route::get('helth_index', [HelthController::class, 'index'])->name('helth.index')->middleware('auth');
Route::get('helth_show/{id}', [HelthController::class, 'show'])->name('helth.show')->middleware('auth');
Route::post('formsubmit', [HelthController::class, 'formsubmit'])->name('formsubmit');
Route::get('helth-coverage', [HelthController::class, 'helthcoverage'])->name('helth-coverage');*/

Route::post('contactus', [ContactusController::class, 'store'])->name('contactus');
Route::get('contactusindex', [ContactusController::class, 'contactusindex'])->name('contactusindex');
Route::get('contactusshow/{id}', [ContactusController::class, 'contactusshow'])->name('contactus.show');

Route::get('terms', [ContactusController::class, 'terms'])->name('terms');
Route::get('privacy', [ContactusController::class, 'policy'])->name('policy');

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
    Route::prefix('edit-history')->group( function(){    
	    Route::get('/', [ EditHistoryController::class, 'index'])
	    ->name('edit_history');
	    Route::post('/listing', [ EditHistoryController::class, 'getListing'])
	    ->name('edit_history.listing');
	});
	//edit history route group ends
});





Route::get('/', function () {
    return view('welcome');
});


<?php

use App\Http\Controllers\Backsite\ConsultationController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Frontsite\AppointmentController;
use App\Http\Controllers\Frontsite\PaymentController;
use App\Http\Controllers\Backsite\DashboardController;
use App\Http\Controllers\Backsite\DoctorController;
use App\Http\Controllers\Backsite\PermissionController;
use App\Http\Controllers\Backsite\RoleController;
use App\Http\Controllers\Backsite\SpecialistController;
use App\Http\Controllers\Backsite\UserController;
use App\Http\Controllers\Backsite\TypeUserController;
use App\Models\MasterData\Consultation;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::resource('/', LandingController::class);

Route::group(['middleware' => ['auth:sanctum', 'verified']], function(){

    // appointment page
    Route::resource('appointment', AppointmentController::class);

    // payment page
    Route::resource('payment', PaymentController::class);
});

Route::group(['prefix' => 'backsite', 'as' => 'backsite.', 'middleware' => ['auth:sanctum', 'verified']], function () {
    
    // dashboard
    Route::resource('dashboard', DashboardController::class);

    // permission
    // Route::get('permission', [PermissionController::class, 'index'])->name('permission');
    Route::resource('permission', PermissionController::class);

    // role
    Route::resource('role', RoleController::class);

    // user
    Route::resource('user', UserController::class);

    // user type
    Route::resource('type-user', TypeUserController::class);

    // specialist
    Route::resource('specialist', SpecialistController::class);

    // consultation
    Route::resource('consultation', ConsultationController::class);

    // doctor
    Route::resource('doctor', DoctorController::class);

} );

// Route::get('/success', function(){
//     return view('pages.frontsite.success.payment-success');
// });

// Route::get('/success-signup', function(){
//     return view('pages.frontsite.success.signup-success');
// });
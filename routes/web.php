<?php

use App\Http\Controllers\MaintenanceController;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehicleController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//email verif notice
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

//in mail verify
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

//new verification email
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//The Password Reset Link Request Form
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

//Handling The Reset Link Request Form Submission
Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

//The Password Reset Form
Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

//Handling The Password Reset Form Submission
Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

require __DIR__.'/auth.php';

//Show maintenances view
Route::get('/maintenances', [MaintenanceController::class, 'showMaintenances'])->middleware(['auth', 'verified'])->name('maintenances');

//Show maintenance add view
Route::get('/add-maintenance-form', [MaintenanceController::class, 'showMaintenanceAdd'])->middleware(['auth', 'verified']);

//Insert maintenance
Route::post('/insert-maintenance', [MaintenanceController::class, 'insertMaintenance'])->middleware(['auth', 'verified']);

//Show vehicles view
Route::get('/vehicles', [VehicleController::class, 'showVehicles'])->middleware(['auth', 'verified'])->name('vehicles');

//Show vehicle add view
Route::get('/add-vehicle-form', [VehicleController::class, 'showVehicleAdd'])->middleware(['auth', 'verified']);

//Show vehicle edit view
Route::get('/edit-vehicle-form/{vehicle}', [VehicleController::class, 'showVehicleEdit'])->middleware(['auth', 'verified']);

//Insert vehicle
Route::post('/insert-vehicle', [VehicleController::class, 'insertVehicle'])->middleware(['auth', 'verified']);

//Update vehicle
Route::put('/edit-vehicle/{vehicle}', [VehicleController::class, 'updateVehicle'])->middleware(['auth', 'verified']);

//Delete vehicle
Route::delete('/delete-vehicle/{vehicle}', [VehicleController::class, 'deleteVehicle'])->middleware(['auth', 'verified']);
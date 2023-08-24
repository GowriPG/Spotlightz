<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//login
Route::post('login', [LoginController::class, 'login'])->name('login');
//password
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password');
Route::post('reset-password', [ForgotPasswordController::class, 'reset'])->name('password.reset');
//captcha
// Route::get('/contact-form', [CaptchaServiceController::class, 'index']);
// Route::post('/captcha-validation', [CaptchaServiceController::class, 'capthcaFormValidate']);
// Route::get('/reload-captcha', [CaptchaServiceController::class, 'reloadCaptcha']);

Route::middleware('auth:api')->group(function () {
    //get Profile
    Route::get('/profile/{user}', [ProfileController::class, 'showProfile'])->name('profile.show');
    // Update user profile
    Route::put('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');

    // Create user profile (optional if profile creation is separate from user registration)
    Route::post('/profile', [ProfileController::class, 'createProfile'])->name('profile.create');
});

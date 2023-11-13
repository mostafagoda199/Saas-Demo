<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::controller(TenantController::class)->group(function () {
    Route::post('store/tenant', 'storeTenant')->name('tenant.store');
});

Route::controller(AuthController::class)->group(function () {
    Route::post('login/{tenant_slug?}', 'login')->name('login');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(UserController::class)->group(function (){
        Route::get('/users', 'index')->name('landlord.users.index');
        Route::get('{tenant_slug}/users', 'index')->name('tenant.users.index');
    });
});

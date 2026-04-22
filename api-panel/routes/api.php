<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Roles\RoleController;
use App\Http\Controllers\Clients\ClientController;
use App\Http\Controllers\Services\InternalServiceController;
use App\Http\Controllers\User\userController;

Route::group([
    //'middleware' => 'auth:api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
    Route::post('/me', [AuthController::class, 'me'])->middleware('auth:api')->name('me');
});

Route::group([
    "middleware" => ["auth:api"]
], function($router){
    Route::resource("role", RoleController::class); 
    Route::resource("clients", ClientController::class);
    Route::resource("services", InternalServiceController::class);
    Route::resource("users", userController::class);
});
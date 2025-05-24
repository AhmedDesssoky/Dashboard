<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ServiceController;
use Illuminate\Http\Request;
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

Route::prefix('/admin')->controller(AuthController::class)->group(function(){
    Route::post('/','login');
    Route::post('/logout','logout')->middleware('auth:sanctum');
    Route::middleware('auth:sanctum')->group(function(){
        // SERVICES MODULE
        Route::controller(ServiceController::class)->group(function(){
            Route::get('/','index');
            Route::post('/store','store');
            Route::post('/update/{id}','update');
            Route::get('/show/{id}','show');
            Route::get('/delete/{id}','destroy');

        });

    });

});


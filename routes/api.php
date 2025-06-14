<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FeatureController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\SubscriberController;
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
        // FEATURES MODULE
        Route::controller(FeatureController::class)->group(function(){
            Route::get('/features','index');
            Route::post('/features/create','store');
            Route::post('/features/update/{id}','update');
            Route::get('/features/show/{id}','show');
            Route::get('/features/delete/{id}','destroy');

        });

        // MESSAGES MODULE
        Route::controller(MessageController::class)->group(function(){
            Route::get('/messages/','index');
            Route::post('/messages/create','store');
            Route::get('/messages/show/{id}','show');
            Route::get('/messages/delete/{id}','destroy');

        });

        // SUBSCRIBERS MODULE
        Route::controller(SubscriberController::class)->group(function(){
            Route::get('/subscribers/','index');
            Route::post('/subscribers/create','store');
            Route::get('/subscribers/show/{id}','show');
            Route::get('/subscribers/delete/{id}','destroy');


        });

    });

});


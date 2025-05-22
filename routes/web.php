<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\TestimonialController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


// Front Route

Route::name('front.')->controller(FrontController::class)->group(function(){
    // Home Page
    Route::post('/subscriber/store','subscriberStore')->name('subscriber.store');
    Route::get('/','index')->name('index');
    Route::get('/about','about')->name('about');
    Route::get('/service','service')->name('service');

    Route::post('/contact/store','contactStore')->name('contact.store');
    Route::get('/contact','contact')->name('contact');
});
//  Admin Route
Route::name('admin.')->prefix(LaravelLocalization::setLocale().'/admin')->middleware([
    'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ])
    ->group(function(){


    Route::middleware('auth')->group(function(){
        // Home Page
        Route::view('/','admin.index')->name('index');
        // Services
        Route::controller(ServiceController::class)->group(function(){

            Route::resource('services', ServiceController::class);
        });
        // Features
        Route::controller(FeatureController::class)->group(function(){

            Route::resource('features', FeatureController::class);
        });
        // Messages
        Route::controller(MessageController::class)->group(function(){

            Route::resource('messages', MessageController::class)->only(['index','show','destroy']);
        });
        // subscribers
        Route::controller(SubscriberController::class)->group(function(){

            Route::resource('subscribers', SubscriberController::class)->only(['index','show','destroy']);
        });
        // Testimonials
        Route::controller(TestimonialController::class)->group(function(){

            Route::resource('testimonials', TestimonialController::class);
        });
        // Companies
        Route::controller(CompanyController::class)->group(function(){

            Route::resource('companies', CompanyController::class);
        });
        // Members
        Route::controller(MemberController::class)->group(function(){

            Route::resource('members', MemberController::class);
        });
        // Settings
        Route::controller(SettingController::class)->group(function(){

            Route::resource('settings', SettingController::class)->only(['update','index']);
        });
    });

    require __DIR__.'/auth.php';

});

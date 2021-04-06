<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::group(['domain' => 'rizky-ramadhan.com'], function() {
    Route::get('', 'WebController@main_page_light')->name('home_light');
    Route::get('dark', 'WebController@main_page_dark')->name('home_dark');
});
Route::group(['domain' => 'anniversary.rizky-ramadhan.com'], function() {
    Route::get('', 'WebController@anniversary')->name('anniversary_page');
});

Route::group(['domain' => 'sd'], function() {

    Route::get('auth', 'Auth\OfficeController@index')->name('auth');
    Route::get('auth/reset/{token}', 'Auth\OfficeController@reset');
    Route::post('auth/reset', 'Auth\OfficeController@do_reset')->name('reset_password');

    Route::post('login', 'Auth\OfficeController@do_login');
    Route::post('register', 'Auth\OfficeController@do_register');
    Route::post('forgot', 'Auth\OfficeController@do_forgot');

    Route::group(['middleware' => 'auth:employee'], function () {
        Route::get('logout', 'Auth\OfficeController@do_logout')->name('logout');
        Route::get('auth/verify', function () {
            return view('office.auth.verify');
        })->name('office.verification.notice');
    });

    Route::group(['middleware' => 'auth:employee','verified'], function () {

        Route::get('/', function(){
            return redirect()->route('dashboard');
        });
        Route::get('dashboard', 'OfficeController@index')->name('dashboard');

        // CLIENT
        Route::get('client', 'Master\ClientController@index')->name('client');
        Route::get('client/create', 'Master\ClientController@create')->name('client_input');
        Route::post('client/store', 'Master\ClientController@store')->name('client_store');
        Route::get('client/{client:slug}/edit', 'Master\ClientController@edit');
        Route::post('client/{client:slug}/update', 'Master\ClientController@update');
        Route::post('client/{client:slug}/delete', 'Master\ClientController@destroy');
        Route::post('client/{client:slug}/active', 'Master\ClientController@active');
        Route::post('client/{client:slug}/non-active', 'Master\ClientController@non_active');

        // PORTFOLIO
        Route::get('portfolio', 'Master\ProjectController@index')->name('portfolio');
        Route::get('portfolio/create', 'Master\ProjectController@create')->name('portfolio_input');
        Route::post('portfolio/store', 'Master\ProjectController@store')->name('portfolio_store');
        Route::get('portfolio/{portfolio}/edit', 'Master\ProjectController@edit');
        Route::post('portfolio/{portfolio}/edit', 'Master\ProjectController@update');
        Route::post('portfolio/{portfolio}/delete', 'Master\ProjectController@destroy');
        Route::post('portfolio/{portfolio}/active', 'Master\ProjectController@active');
        Route::post('portfolio/{portfolio}/non-active', 'Master\ProjectController@non_active');

        Route::get('notifications', 'Master\EmployeeController@notifications');

        Route::get('employee', 'Master\EmployeeController@index')->name('employee');
        Route::post('employee/{id_user}/follow', 'Master\EmployeeController@follow')->name('follow');
        Route::delete('employee/{id_user}/unfollow', 'Master\EmployeeController@unfollow')->name('unfollow');

        Route::get('product', 'OfficeController@index')->name('product');

        Route::get('member', 'OfficeController@index')->name('member');
        Route::get('contact', 'OfficeController@index')->name('contact');
        Route::get('email', 'OfficeController@index')->name('email');

        Route::get('refresh-all', function() {
            Artisan::call('migrate:refresh');
            Artisan::call('db:seed');
            Artisan::call('route:clear');
            Artisan::call('cache:clear');
            Artisan::call('config:clear');
            Artisan::call('view:clear');
            return response()->json([
                'alert' => 'success',
                'message' => 'Success to refresh App & DB.',
            ]);
        })->name('refresh-all');
        Route::get('refresh-db', function() {
            Artisan::call('migrate:refresh');
            Artisan::call('db:seed');
            return response()->json([
                'alert' => 'success',
                'message' => 'Success to refresh DB.',
            ]);
            return redirect()->route('dashboard')->with('Ok', 'DB refreshed');
        })->name('refresh-db');

        Route::get('clear-cache', function() {
            Artisan::call('route:clear');
            Artisan::call('cache:clear');
            Artisan::call('config:clear');
            Artisan::call('view:clear');
            return response()->json([
                'alert' => 'success',
                'message' => 'Success to clear cache.',
            ]);
        })->name('clear-cache');

        Route::get('set-cache', function() {
            Artisan::call('route:cache');
            Artisan::call('cache:cache');
            Artisan::call('config:cache');
            Artisan::call('view:cache');
            return response()->json([
                'alert' => 'success',
                'message' => 'Success to set cache.',
            ]);
        })->name('set-cache');
    });
});

// Route::group(['domain' => 'shop.rizky-ramadhan.com'], function() {
//     Route::get('auth', 'Auth\ShopController@index')->name('authentication');
    // Route::get('auth/google', 'Auth\ShopController@redirectToGoogle')->name('auth_google');
    // Route::get('auth/google/callback', 'Auth\ShopController@handleGoogleCallback');
    // Route::get('auth/verify/{token}', 'Auth\ShopController@verify');
    // Route::get('auth/reset/{token}', 'Auth\ShopController@reset');
    // Route::post('auth/reset', 'Auth\ShopController@do_reset')->name('reset_password');

    // Route::post('login', 'Auth\ShopController@do_login');
    // Route::post('register', 'Auth\ShopController@do_register')->name('register');
    // Route::post('forgot', 'Auth\ShopController@do_forgot');

    // Route::middleware(['auth:member'])->group(function () {
    //     Route::get('signout', 'Auth\ShopController@do_logout')->name('signout');
    //     Route::get('auth/verify', function () {
    //         return view('office.auth.verify');
    //     })->name('shop.verification.notice');
    //     Route::get('email/resend', function () {
    //         return view('office.auth.verify');
    //     })->name('shop.verification.resend');    
    // });
// });
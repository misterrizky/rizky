<?php

use Illuminate\Support\Facades\Route;

Route::group(['domain' => ''], function() {
    Route::get('', 'WebController@main_page_light')->name('home_light');
    Route::get('dark', 'WebController@main_page_dark')->name('home_dark');
    Route::get('refresh-all', function() {
        Artisan::call('migrate:refresh');
        Artisan::call('db:seed');
        Artisan::call('route:clear');
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        return redirect()->route('home_light')->with('Ok', 'All refreshed');
    })->name('refresh-all');
});
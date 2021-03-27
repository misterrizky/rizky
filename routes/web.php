<?php

use Illuminate\Support\Facades\Route;

Route::group(['domain' => 'rizky-ramadhan.com'], function() {
    Route::get('', 'WebController@main_page_light')->name('home_light');
    Route::get('dark', 'WebController@main_page_dark')->name('home_dark');
});
Route::group(['domain' => 'office.rizky-ramadhan.com'], function() {
    Route::get('', 'OfficeController@index')->name('default');
    Route::get('auth', 'Office\AuthController@index')->name('auth');
});
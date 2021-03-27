<?php

use Illuminate\Support\Facades\Route;

Route::group(['domain' => ''], function() {
    Route::get('', 'WebController@main_page_light')->name('home_light');
    Route::get('dark', 'WebController@main_page_dark')->name('home_dark');
});
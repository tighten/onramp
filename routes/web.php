<?php


Route::redirect('/', '/en');

Route::group(['prefix' => app()->getLocale() ?? 'en'], function () {
    Route::view('/', 'welcome');

    Route::get('learn', 'LearnController');

    Route::view('home', 'home');

    Route::view('dev', 'dev')->name('dev');

    Auth::routes();
});

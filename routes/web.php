<?php


Route::redirect('/', '/en');

Route::group(['prefix' => '{locale}'], function () {
    Route::view('/', 'welcome');

    Route::get('learn', 'LearnController');

    Route::view('home', 'home');

    Route::view('dev', 'dev')->name('dev');

    Auth::routes();
});

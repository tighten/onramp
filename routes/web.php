<?php


Route::redirect('/', '/en');

Route::group(['prefix' => '{locale}'], function () {
    Route::view('/', 'welcome');

    // @todo: Delete because this is old
    Route::get('learn', 'LearnController');

    Route::view('home', 'home');

    Route::group(['prefix' => 'modules', 'as' => 'modules.'], function () {
        Route::get('/', 'ModuleController@index')->name('index');
        Route::get('{module}', 'ModuleController@show')->name('show');
    });


    Auth::routes();
});

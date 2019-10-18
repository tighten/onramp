<?php


Route::redirect('/', '/en');

Route::group(['prefix' => '{locale}'], function () {
    Route::view('/', 'welcome')->name('welcome');

    Route::get('glossary', 'GlossaryController@index')->name('glossary');

    Route::group(['middleware' => 'auth'], function () {
        Route::view('home', 'home')->name('home');
    });

    Route::group(['prefix' => 'modules', 'as' => 'modules.'], function () {
        Route::get('/', 'ModuleController@index')->name('index');
        Route::get('{module}', 'ModuleController@show')->name('show');
    });

    Route::view('chat', 'chat', ['pageTitle' => 'Chat Guidelines'])->name('chat');

    Auth::routes();
});

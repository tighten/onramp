<?php

Route::get('/', 'RootRedirectController');

Route::group(['prefix' => '{locale}'], function () {

    Route::view('/', 'welcome')->name('welcome');

    Route::view('chat', 'chat', ['pageTitle' => 'Chat Guidelines'])->name('chat');
    Route::view('dev', 'dev')->name('dev');
    Route::get('glossary', 'GlossaryController@index')->name('glossary');

    Route::group(['prefix' => 'modules', 'as' => 'modules.'], function () {
        Route::get('/', 'ModuleController@index')->name('index');
        Route::get('{module}', 'ModuleController@show')->name('show');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('wizard', 'Auth\\WizardController@index')->name('wizard.index');
        Route::post('wizard', 'Auth\\WizardController@store')->name('wizard.store');
        Route::view('home', 'home')->name('home');
        Route::get('preferences', 'PreferenceController@index')->name('user.preferences.index');
    });

    Route::post('preferences', 'PreferenceController@store')->name('user.preferences.store');

    Auth::routes();
});

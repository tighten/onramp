<?php

Auth::routes();

Route::view('/', 'welcome');

Route::get('learn/{locale?}', 'LearnController');

Route::view('home', 'home');

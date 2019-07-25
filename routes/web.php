
<?php

Route::view('/', 'welcome');

Route::get('learn', function () {
    return view('learn', [
        'learn' => require(base_path('learn.php')),
    ]);
});

Auth::routes();

Route::view('home', 'home');

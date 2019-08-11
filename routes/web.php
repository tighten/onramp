
<?php

Route::view('/', 'welcome');

Route::get('learn/{locale?}', function ($locale = 'en') {
    App::setLocale($locale);

    if($locale != 'en' && file_exists(base_path("learn.$locale.php"))) {
        $learnPath = base_path("learn.$locale.php");
    } else {
        $learnPath = base_path('learn.php');
    }

    return view('learn', [
        'learn' => require($learnPath),
    ]);
});

Auth::routes();

Route::view('home', 'home');

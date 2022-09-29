<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\WizardController;
use App\Http\Controllers\CompletionsController;
use App\Http\Controllers\GlossaryController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PreferenceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RootRedirectController;
use App\Http\Controllers\TrackController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', RootRedirectController::class);

Route::group(['prefix' => '{locale}'], function () {
    Route::view('/', 'welcome')->name('welcome');

    Route::view('use-of-data', 'use-of-data')->name('use-of-data');
    Route::get('glossary', [GlossaryController::class, 'index'])->name('glossary');
    Route::get('tracks', [TrackController::class, 'index'])->name('tracks');

    Route::group(['prefix' => 'modules', 'as' => 'modules.'], function () {
        Route::get('/', [ModuleController::class, 'index'])->name('index');
        Route::get('{module}/{resourceType}', [ModuleController::class, 'show'])
            ->name('show')
            ->where('resourceType', 'free-resources|paid-resources|quizzes|exercises');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('wizard', [WizardController::class, 'index'])->name('wizard.index');
        Route::post('wizard', [WizardController::class, 'store'])->name('wizard.store');
        Route::get('profile', [ProfileController::class, 'show'])->name('user.profile.show');
        Route::put('profile', [ProfileController::class, 'update'])->name('user.profile.update');
        Route::get('preferences', [PreferenceController::class, 'index'])->name('user.preferences.index');
        Route::post('completions', [CompletionsController::class, 'store'])->name('user.completions.store');
        Route::delete('completions', [CompletionsController::class, 'destroy'])->name('user.completions.destroy');
    });

    Route::patch('preferences', [PreferenceController::class, 'update'])->name('user.preferences.update');

    Auth::routes(['register' => false]);

    Route::group(['prefix' => 'login'], function () {
        Route::get('github', [LoginController::class, 'redirectToProvider'])->name('login.github');
        Route::get('github/callback', [LoginController::class, 'handleProviderCallback']);
    });
});

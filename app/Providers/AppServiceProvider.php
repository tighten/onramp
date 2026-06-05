<?php

declare(strict_types=1);

namespace App\Providers;

use App\Handlers\Events\SlackSubscriber;
use App\Models\Module;
use App\Models\Skill;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\NovaApplicationServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/en/modules';

    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(IdeHelperServiceProvider::class);
        }

        if (class_exists(NovaApplicationServiceProvider::class)) {
            $this->app->register(NovaServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Relation::morphMap([
            'App\Module' => Module::class,
            'App\Resource' => \App\Models\Resource::class,
            'App\Skill' => Skill::class,
        ]);

        if ($this->app->environment() !== 'testing') {
            Event::subscribe(SlackSubscriber::class);
        }

        $this->app->setLocale(locale());

        $this->bootRoute();
    }

    public function bootRoute(): void
    {
        Route::pattern('locale', '^[a-z]{2}(?:_[a-z]{2})?$');

        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

    }
}

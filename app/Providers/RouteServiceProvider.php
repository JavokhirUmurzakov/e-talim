<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware(['web','mv_admin'])
                ->group(base_path('routes/mvadmin.php'));

            Route::middleware(['web','mv_upvka'])
                ->group(base_path('routes/mvupvka.php'));
            Route::middleware(['web','ohtm_uquv_bulimi'])
                ->group(base_path('routes/uquvbulimi.php'));
            Route::middleware(['web','ohtm_uqituvchi'])
                ->group(base_path('routes/uqituvchi.php'));

            Route::middleware(['web','ohtm_tinglovchi'])
                ->group(base_path('routes/tinglovchi.php'));

        });
    }
}

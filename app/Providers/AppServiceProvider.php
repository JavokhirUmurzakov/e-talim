<?php

namespace App\Providers;

use App\Models\KunlikNazorat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFour();
//        Paginator::useBootstrapFive();

        view()->composer('layouts.uqituvchi', function ($view) {
            if (Auth::check()) {
                $fakultetKafedraId = auth()->user()->uqituvchi->fakultet_kafedra_id;
                $kundalikNazoratCount = KunlikNazorat::where('fakultet_kafedra_id', $fakultetKafedraId)
                    ->where('korildi',false)->count();
            } else {
                $kundalikNazoratCount = 0;
            }

            $view->with('extra_data', $kundalikNazoratCount);
        });
    }
}

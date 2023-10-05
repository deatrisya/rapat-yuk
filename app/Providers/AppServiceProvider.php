<?php

namespace App\Providers;

use App\Models\BookingList;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('main.sidebar', function ($view) {
            $pendingBookingCount = BookingList::where('status', 'PENDING')->count();
            $view->with('pendingBookingCount', $pendingBookingCount);
        });
    }
}

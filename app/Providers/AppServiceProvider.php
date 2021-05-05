<?php

namespace App\Providers;

use App\Models\User;
use App\Models\CustomerDependant;
use App\Observers\UserObserver;
use App\Observers\CustomerDependantObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        CustomerDependant::observe(CustomerDependantObserver::class);
    }
}

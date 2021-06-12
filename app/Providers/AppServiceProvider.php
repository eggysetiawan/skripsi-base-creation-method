<?php

namespace App\Providers;

use App\Models\User;
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
        view()->share(
            'users',
            User::query()
                ->select('id', 'name')
                ->whereHas('roles', function ($query) {
                    return $query->where('name', 'photographer');
                })
                ->get()
        );
    }
}

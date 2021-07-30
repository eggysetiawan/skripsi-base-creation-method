<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Score;
use Illuminate\Database\Eloquent\Model;
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

        Model::preventLazyLoading(!$this->app->isProduction());

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

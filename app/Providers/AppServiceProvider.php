<?php

namespace App\Providers;

use App\Lib\Auth\AuthVk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
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
        $auth = new AuthVk();
        $urlForCode = $auth->getUrlCode();
        View::share([
            'urlForCode' => $urlForCode,
        ]);
    }
}

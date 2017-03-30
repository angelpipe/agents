<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpFoundation\Request;

class ZipMatcherServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $request = $this->app->make(Request::class);
        $this->app->when('App\ZipMatcher')
            ->needs('$zip_one')
            ->give($request->input('zip-one'));
        $this->app->when('App\ZipMatcher')
            ->needs('$zip_two')
            ->give($request->input('zip-two'));
    }
}

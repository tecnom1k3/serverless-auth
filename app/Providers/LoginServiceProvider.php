<?php

namespace App\Providers;

use Digitec\Service\Login\LoginInterface;
use Digitec\Service\Login\LoginService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

/**
 * Class LoginServiceProvider
 * @package App\Providers
 */
class LoginServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(LoginInterface::class, function ($app) {
            return $app->make(LoginService::class);
        });
    }

    /**
     * @return array|string[]
     */
    public function provides()
    {
        return [LoginInterface::class];
    }
}

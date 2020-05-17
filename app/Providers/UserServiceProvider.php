<?php

declare(strict_types=1);

namespace App\Providers;

use Digitec\Service\User\UserService;
use Digitec\Service\User\UserServiceInterface;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

/**
 * Class UserServiceProvider
 * @package App\Providers
 */
class UserServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            UserServiceInterface::class,
            function ($app) {
                return $app->make(UserService::class);
            }
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * @return array|string[]
     */
    public function provides()
    {
        return [UserService::class];
    }
}

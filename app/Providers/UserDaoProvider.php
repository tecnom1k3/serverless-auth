<?php


namespace App\Providers;


use Digitec\Dao\User\UserDao;
use Digitec\Dao\User\UserDaoInterface;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

/**
 * Class UserDaoProvider
 * @package App\Providers
 */
class UserDaoProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            UserDaoInterface::class,
            function ($app) {
                return $app->make(UserDao::class);
            }
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [UserDao::class];
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

}

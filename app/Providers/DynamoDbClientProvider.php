<?php


namespace App\Providers;


use Aws\DynamoDb\DynamoDbClient;
use Aws\Sdk;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

/**
 * Class DynamoDbClientProvider
 * @package App\Providers
 */
class DynamoDbClientProvider extends ServiceProvider implements
    DeferrableProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            DynamoDbClient::class,
            function ($app) {
                /** @var Sdk $sdk */
                $sdk = $app->make('aws');
                return $sdk->createClient(
                    'DynamoDb',
                    [
                        'endpoint' => 'http://host.docker.internal:4569', //TODO: parametrize for given environment
                    ]
                );
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
        return [DynamoDbClient::class];
    }

}

<?php

declare(strict_types=1);

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

                $dynamoDBConfig = [];

                if (env('DYNAMODB_ENDPOINT')) {
                    $dynamoDBConfig['endpoint'] = env('DYNAMODB_ENDPOINT');
                }

                return $sdk->createClient('DynamoDb', $dynamoDBConfig);
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

<?php

declare(strict_types=1);

namespace Digitec\Dao\User;


use Aws\DynamoDb\DynamoDbClient;
use Digitec\Model\UserModel;
use Digitec\Model\UserModelCollection;

/**
 * Class UserDao
 * @package Digitec\Dao\User
 */
class UserDao implements UserDaoInterface
{
    /**
     * @var DynamoDbClient
     */
    protected DynamoDbClient $dynamoDbClient;

    /**
     * UserDao constructor.
     * @param DynamoDbClient $dynamoDbClient
     */
    public function __construct(DynamoDbClient $dynamoDbClient)
    {
        $this->dynamoDbClient = $dynamoDbClient;
    }

    /**
     * @return UserModelCollection
     */
    public function listUsers(): UserModelCollection
    {
        $userModelCollection = new UserModelCollection();
        $rs = $this->dynamoDbClient->scan(
            [
                'AttributesToGet' => ['uid', 'userName'],
                'TableName' => 'auth_users'
            ]
        );

        if ($rs->get('Count') > 0) {
            foreach ($rs->get('Items') as $item) {
                $userModel = new UserModel();
                $userModel->setUid('foo')
                    ->setUserName('bar');
                $userModelCollection->addUser($userModel);
            }
        }

        return $userModelCollection;
    }
}

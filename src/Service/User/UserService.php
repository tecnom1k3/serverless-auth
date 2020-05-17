<?php

declare(strict_types=1);

namespace Digitec\Service\User;


use Digitec\Dao\User\UserDaoInterface;
use Digitec\Model\UserModelCollection;

/**
 * Class UserService
 * @package Digitec\Service\User
 */
class UserService implements UserServiceInterface
{
    /**
     * @var UserDaoInterface
     */
    protected UserDaoInterface $userDao;

    /**
     * UserService constructor.
     * @param UserDaoInterface $userDao
     */
    public function __construct(UserDaoInterface $userDao)
    {
        $this->userDao = $userDao;
    }

    /**
     * @return UserModelCollection
     */
    public function listUsers(): UserModelCollection
    {
        return $this->userDao->listUsers();
    }
}

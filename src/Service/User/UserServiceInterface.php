<?php

declare(strict_types=1);

namespace Digitec\Service\User;


use Digitec\Model\UserModelCollection;

/**
 * Interface UserServiceInterface
 * @package Digitec\Service\User
 */
interface UserServiceInterface
{

    /**
     * @return UserModelCollection
     */
    public function listUsers(): UserModelCollection;

}

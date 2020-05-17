<?php

declare(strict_types=1);

namespace Digitec\Dao\User;


use Digitec\Model\UserModelCollection;

/**
 * Interface UserDaoInterface
 * @package Digitec\Dao\User
 */
interface UserDaoInterface
{

    /**
     * @return UserModelCollection
     */
    public function listUsers(): UserModelCollection;

}

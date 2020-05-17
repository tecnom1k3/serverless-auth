<?php

declare(strict_types=1);

namespace Digitec\Model;


use Illuminate\Contracts\Support\Arrayable;

/**
 * Class UserModel
 * @package Digitec\Model
 */
class UserModel implements Arrayable
{

    /**
     * @var string
     */
    protected string $uid;

    /**
     * @var string
     */
    protected string $userName;

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'uid' => $this->uid,
            'userName' => $this->userName,
        ];
    }

    /**
     * @return string
     */
    public function getUid(): string
    {
        return $this->uid;
    }

    /**
     * @param string $uid
     * @return UserModel
     */
    public function setUid(string $uid): UserModel
    {
        $this->uid = $uid;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     * @return UserModel
     */
    public function setUserName(string $userName): UserModel
    {
        $this->userName = $userName;
        return $this;
    }

}

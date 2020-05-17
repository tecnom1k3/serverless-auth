<?php

declare(strict_types=1);

namespace Digitec\Model;


use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;

/**
 * Class UserModelCollection
 * @package Digitec\Model
 */
class UserModelCollection implements Arrayable
{

    /**
     * @var Collection
     */
    protected Collection $userModelCollection;

    /**
     * UserModelCollection constructor.
     */
    public function __construct()
    {
        $this->userModelCollection = new Collection();
    }

    /**
     * @param UserModel $userModel
     * @return $this
     */
    public function addUser(UserModel $userModel): UserModelCollection
    {
        $this->userModelCollection->add($userModel);
        return $this;
    }

    /**
     * Get the instance as an array.
     *
     * @return UserModel[]
     */
    public function toArray(): array
    {
        return $this->userModelCollection->toArray();
    }
}

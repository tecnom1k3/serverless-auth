<?php

declare(strict_types=1);

namespace Digitec\Service\Login;

/**
 * Class LoginService
 * @package Digitec\Service\Login
 */
class LoginService implements LoginInterface
{

    /**
     * @param string $key
     * @param string $password
     * @return string
     */
    public function login(string $key, string $password): string
    {
        return 'entre';
    }

}

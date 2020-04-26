<?php


namespace Digitec\Service\Login;


/**
 * Interface LoginInterface
 * @package Digitec\Service\Login
 */
interface LoginInterface
{

    /**
     * @param string $key
     * @param string $password
     * @return string
     */
    public function login(string $key, string $password): string;

}

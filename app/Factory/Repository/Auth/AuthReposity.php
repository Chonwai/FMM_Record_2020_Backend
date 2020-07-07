<?php

namespace App\Factory\Repository\Auth;

use App\Factory\Validation\InterfaceBasicAuth;
use App\Repository\Auth\AuthRepository;

class AuthReposity implements InterfaceBasicAuth
{
    /**
     * Create the Singleton Pattern
     *
     * @return object
     */
    private static $_instance = null;

    private function __construct()
    {
        // Avoid constructing this class on the outside.
    }

    public static function getInstance()
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function login($request)
    {
        $data = AuthRepository::getInstance()->login($request);
        return $data;
    }

    public function registration($request)
    {
        $data = AuthRepository::getInstance()->registration($request);
        return $data;
    }
}

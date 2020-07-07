<?php

namespace App\Factory\Repository\Auth;

use App\Factory\Repository\AbstractFactory;
use App\Factory\Repository\Auth\AuthReposity;
use App\Utils\ResponseStatusUtils;
use App\Utils\Utils;

class AuthRepositoryFactory extends AbstractFactory
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

    public function doQuery($request, $name)
    {
        $data = null;

        switch ($name) {
            case 'login':
                $data = AuthReposity::getInstance()->login($request);
                break;
            case 'registration':
                $data = AuthReposity::getInstance()->registration($request);
                break;
            default:
                # code...
                break;
        }

        return $data;
    }
}

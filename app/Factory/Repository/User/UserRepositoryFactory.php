<?php

namespace App\Factory\Repository\User;

use App\Factory\Repository\AbstractFactory;
use App\Factory\Repository\User\UserReposity;

class UserRepositoryFactory extends AbstractFactory
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
            case 'responsesAllUsers':
                $data = UserReposity::getInstance()->responseAll($request);
                break;
            case 'responsesSpecifyUser':
                $data = UserReposity::getInstance()->responseSpecify($request);
                break;
            case 'insertUser':
                $data = UserReposity::getInstance()->insert($request);
                break;
            case 'updateUser':
                $data = UserReposity::getInstance()->update($request);
                break;
            case 'deleteUser':
                $data = UserReposity::getInstance()->delete($request);
                break;
            default:
                # code...
                break;
        }

        return $data;
    }
}

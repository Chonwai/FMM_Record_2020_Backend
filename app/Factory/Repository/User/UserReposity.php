<?php

namespace App\Factory\Repository\User;

use App\Factory\Validation\InterfaceBasic;
use App\Repository\User\UsersRepository;

class UserReposity implements InterfaceBasic
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

    public function responseAll()
    {
        $data = UsersRepository::getInstance()->getAll();
        return $data;
    }

    public function responseSpecify($request)
    {
        $data = UsersRepository::getInstance()->getSpecify($request);
        return $data;
    }

    public function insert($request)
    {
        $data = UsersRepository::getInstance()->insert($request);
        return $data;
    }

    public function update($request)
    {
        $data = UsersRepository::getInstance()->update($request);
        return $data;
    }

    public function delete($request)
    {
        $data = UsersRepository::getInstance()->delete($request);
        return $data;
    }
}

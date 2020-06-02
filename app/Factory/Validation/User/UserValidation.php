<?php

namespace App\Factory\Validation\User;

use App\Factory\Validation\InterfaceBasic;
use App\Http\Requests\User\UsersRules;
use Illuminate\Support\Facades\Validator;

class UserValidation implements InterfaceBasic
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
        $validator = Validator::make([], UsersRules::getInstance()->rules());
        return $validator;
    }

    public function responseSpecify($request)
    {
        $validator = Validator::make(['id' => $request->id], UsersRules::getInstance()->responseSpecifyRules());
        return $validator;
    }

    public function insert($request)
    {
        $validator = Validator::make($request->all(), UsersRules::getInstance()->insertRules());
        return $validator;
    }

    public function update($request)
    {
        $validator = Validator::make($request->all(), UsersRules::getInstance()->updateRules());
        return $validator;
    }

    public function delete($request)
    {
        $validator = Validator::make(['id' => $request->id], UsersRules::getInstance()->deleteRules());
        return $validator;
    }
}

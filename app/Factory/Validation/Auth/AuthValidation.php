<?php

namespace App\Factory\Validation\Auth;

use App\Factory\Validation\InterfaceBasicAuth;
use App\Http\Requests\Auth\AuthRules;
use Illuminate\Support\Facades\Validator;

class AuthValidation implements InterfaceBasicAuth
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
        $validator = Validator::make($request->all(), AuthRules::getInstance()->loginRules());
        return $validator;
    }

    public function registration($request)
    {
        $validator = Validator::make($request->all(), AuthRules::getInstance()->registrationRules());
        return $validator;
    }
}

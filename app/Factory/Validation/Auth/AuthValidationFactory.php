<?php

namespace App\Factory\Validation\Auth;

use App\Factory\Validation\AbstractFactory;
use App\Factory\Validation\Auth\AuthValidation;
use App\Utils\ResponseStatusUtils;
use App\Utils\Utils;

class AuthValidationFactory extends AbstractFactory
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

    public function doValidation($request, $name)
    {
        $validation = false;

        switch ($name) {
            case 'login':
                $validation = AuthValidation::getInstance()->login($request);
                break;
            case 'registration':
                $validation = AuthValidation::getInstance()->registration($request);
                break;
            default:
                # code...
                break;
        }

        if ($validation->fails()) {
            $res = Utils::integradeResponseMessage(ResponseStatusUtils::validatorErrorMessage($validation), false);
            return $res;
        } else {
            return true;
        }
    }
}

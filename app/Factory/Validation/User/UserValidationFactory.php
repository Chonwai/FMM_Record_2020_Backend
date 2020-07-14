<?php

namespace App\Factory\Validation\User;

use App\Factory\Validation\AbstractFactory;
use App\Factory\Validation\User\UserValidation;
use App\Utils\ResponseStatusUtils;
use App\Utils\Utils;

class UserValidationFactory extends AbstractFactory
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
            case 'responsesAllUsers':
                $validation = UserValidation::getInstance()->responseAll($request);
                break;
            case 'responsesSpecifyUser':
                $validation = UserValidation::getInstance()->responseSpecify($request);
                break;
            case 'insertTenant':
                $validation = UserValidation::getInstance()->insert($request);
                break;
            case 'updateTenant':
                $validation = UserValidation::getInstance()->update($request);
                break;
            case 'deleteTenant':
                $validation = UserValidation::getInstance()->delete($request);
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

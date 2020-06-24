<?php

namespace App\Factory\Validation\Tenant;

use App\Factory\Validation\AbstractFactory;
use App\Factory\Validation\Tenant\TenantValidation;
use App\Utils\ResponseStatusUtils;
use App\Utils\Utils;

class TenantValidationFactory extends AbstractFactory
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
            case 'responsesAllTenants':
                $validation = TenantValidation::getInstance()->responseAll($request);
                break;
            case 'responsesSpecifyTenant':
                $validation = TenantValidation::getInstance()->responseSpecify($request);
                break;
            case 'responsesSpecifyTenantBySearchFilter':
                $validation = TenantValidation::getInstance()->responseAll($request);
                break;
            case 'insertTenant':
                $validation = TenantValidation::getInstance()->insert($request);
                break;
            case 'updateTenant':
                $validation = TenantValidation::getInstance()->update($request);
                break;
            case 'deleteTenant':
                $validation = TenantValidation::getInstance()->delete($request);
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

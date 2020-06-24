<?php

namespace App\Factory\Repository\Tenant;

use App\Factory\Repository\AbstractFactory;
use App\Factory\Repository\Tenant\TenantReposity;
use App\Utils\ResponseStatusUtils;
use App\Utils\Utils;

class TenantRepositoryFactory extends AbstractFactory
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
            case 'responsesAllTenants':
                $data = TenantReposity::getInstance()->responseAll($request);
                break;
            case 'responsesSpecifyTenant':
                $data = TenantReposity::getInstance()->responseSpecify($request);
                break;
            case 'responsesSpecifyTenantBySearchFilter':
                $data = TenantReposity::getInstance()->responseSpecifyBySearchFilter($request);
                break;
            case 'insertTenant':
                $data = TenantReposity::getInstance()->insert($request);
                break;
            case 'updateTenant':
                $data = TenantReposity::getInstance()->update($request);
                break;
            case 'deleteTenant':
                $data = TenantReposity::getInstance()->delete($request);
                break;
            default:
                # code...
                break;
        }

        if ($data == true) {
            return $data;
        } else {
            return Utils::integradeResponseMessage(ResponseStatusUtils::unknownProblems(), false);
        }
    }
}

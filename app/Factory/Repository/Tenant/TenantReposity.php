<?php

namespace App\Factory\Repository\Tenant;

use App\Factory\Validation\InterfaceBasic;
use App\Repository\Tenant\TenantsRepository;

class TenantReposity implements InterfaceBasic
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
        $data = TenantsRepository::getInstance()->getAll();
        return $data;
    }

    public function responseSpecify($request)
    {
        $data = TenantsRepository::getInstance()->getSpecify($request);
        return $data;
    }

    public function insert($request)
    {
        $data = TenantsRepository::getInstance()->insert($request);
        return $data;
    }

    public function update($request)
    {
        $data = TenantsRepository::getInstance()->update($request);
        return $data;
    }

    public function delete($request)
    {
        $data = TenantsRepository::getInstance()->delete($request);
        return $data;
    }
}

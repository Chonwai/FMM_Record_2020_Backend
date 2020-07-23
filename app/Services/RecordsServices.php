<?php

namespace App\Services;

use App\Repository\Tenant\TenantsRepository;
use App\Utils\GenerateUtils;

class RecordsServices
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

    public function checkTenantExist($request)
    {
        $data = TenantsRepository::getInstance()->getSpecifyByStaffNumber($request);

        if ($data == null) {
            $this->addNewTenant($request);
        }
    }

    public function addNewTenant($request)
    {
        try {
            $insertObject = GenerateUtils::generateInsertTenantObject($request->taken_by, $request->email, $request->contact, $request->staff_number, $request->department, $request->status);
            TenantsRepository::getInstance()->insert($insertObject);
        } catch (\Throwable $th) {
            return $th;
        }
    }
}

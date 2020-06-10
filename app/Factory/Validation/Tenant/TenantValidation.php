<?php

namespace App\Factory\Validation\Tenant;

use App\Factory\Validation\InterfaceBasic;
use App\Http\Requests\Tenant\TenantsRules;
use Illuminate\Support\Facades\Validator;

class TenantValidation implements InterfaceBasic
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
        $validator = Validator::make([], TenantsRules::getInstance()->rules());
        return $validator;
    }

    public function responseSpecify($request)
    {
        $validator = Validator::make(['id' => $request->id], TenantsRules::getInstance()->responseSpecifyRules());
        return $validator;
    }

    public function insert($request)
    {
        $validator = Validator::make($request->all(), TenantsRules::getInstance()->insertRules());
        return $validator;
    }

    public function update($request)
    {
        $validator = Validator::make($request->all(), TenantsRules::getInstance()->updateRules());
        return $validator;
    }

    public function delete($request)
    {
        $validator = Validator::make(['id' => $request->id], TenantsRules::getInstance()->deleteRules());
        return $validator;
    }
}

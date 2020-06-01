<?php

namespace App\Factory\Validation\Asset;

use App\Factory\Validation\InterfaceBasic;
use App\Http\Requests\Asset\AssetsRules;
use Illuminate\Support\Facades\Validator;

class AssetValidation implements InterfaceBasic
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
        $validator = Validator::make([], AssetsRules::getInstance()->rules());
        return $validator;
    }

    public function responseSpecify($request)
    {
        $validator = Validator::make(['id' => $request->id], AssetsRules::getInstance()->responseSpecifyRules());
        return $validator;
    }

    public function insert($request)
    {
        $validator = Validator::make($request->all(), AssetsRules::getInstance()->insertRules());
        return $validator;
    }

    public function update($request)
    {
        $validator = Validator::make($request->all(), AssetsRules::getInstance()->updateRules());
        return $validator;
    }

    public function delete($request)
    {
        $validator = Validator::make(['id' => $request->id], AssetsRules::getInstance()->deleteRules());
        return $validator;
    }
}

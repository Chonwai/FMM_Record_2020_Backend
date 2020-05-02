<?php

namespace App\Factory\Validation\Record;

use App\Factory\Validation\InterfaceBasic;
use App\Http\Requests\Record\RecordsRules;
use Illuminate\Support\Facades\Validator;

class RecordValidation implements InterfaceBasic
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
        $validator = Validator::make([], RecordsRules::getInstance()->rules());
        return $validator;
    }

    public function responseSpecify($request)
    {
        $validator = Validator::make(['id' => $request->id], RecordsRules::getInstance()->responseSpecifyRules());
        return $validator;
    }

    public function insert($request)
    {
        $validator = Validator::make($request->all(), RecordsRules::getInstance()->insertRules());
        return $validator;
    }

    public function update($request)
    {
        $validator = Validator::make($request->all(), RecordsRules::getInstance()->updateRules());
        return $validator;
    }

    public function delete($request)
    {
        $validator = Validator::make(['id' => $request->id], RecordsRules::getInstance()->deleteRules());
        return $validator;
    }
}

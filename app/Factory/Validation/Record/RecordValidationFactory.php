<?php

namespace App\Factory\Validation\Record;

use App\Factory\Validation\AbstractFactory;
use App\Factory\Validation\Record\RecordValidation;
use App\Utils\ResponseStatusUtils;
use App\Utils\Utils;

class RecordValidationFactory extends AbstractFactory
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
            case 'responsesAllRecords':
                $validation = RecordValidation::getInstance()->responseAll($request);
                break;
            case 'responsesSpecifyRecord':
                $validation = RecordValidation::getInstance()->responseSpecify($request);
                break;
            case 'insertRecord':
                $validation = RecordValidation::getInstance()->insert($request);
                break;
            case 'deleteRecord':
                $validation = RecordValidation::getInstance()->delete($request);
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

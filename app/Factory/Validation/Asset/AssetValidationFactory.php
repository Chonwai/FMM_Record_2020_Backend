<?php

namespace App\Factory\Validation\Record;

use App\Factory\Validation\AbstractFactory;
use App\Factory\Validation\Record\AssetValidation;
use App\Utils\ResponseStatusUtils;
use App\Utils\Utils;

class AssetValidationFactory extends AbstractFactory
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
            case 'responsesAllAssets':
                $validation = AssetValidation::getInstance()->responseAll($request);
                break;
            case 'responsesSpecifyAsset':
                $validation = AssetValidation::getInstance()->responseSpecify($request);
                break;
            case 'insertAsset':
                $validation = AssetValidation::getInstance()->insert($request);
                break;
            case 'updateAsset':
                $validation = AssetValidation::getInstance()->update($request);
                break;
            case 'deleteAsset':
                $validation = AssetValidation::getInstance()->delete($request);
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

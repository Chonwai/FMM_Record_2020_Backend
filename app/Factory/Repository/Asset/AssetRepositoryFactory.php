<?php

namespace App\Factory\Repository\Asset;

use App\Factory\Repository\AbstractFactory;
use App\Factory\Repository\Asset\AssetReposity;
use App\Utils\ResponseStatusUtils;
use App\Utils\Utils;

class AssetRepositoryFactory extends AbstractFactory
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
            case 'responsesAllAssets':
                $data = AssetReposity::getInstance()->responseAll($request);
                break;
            case 'responsesSpecifyAsset':
                $data = AssetReposity::getInstance()->responseSpecify($request);
                break;
            case 'insertAsset':
                $data = AssetReposity::getInstance()->insert($request);
                break;
            case 'updateAsset':
                $data = AssetReposity::getInstance()->update($request);
                break;
            case 'deleteAsset':
                $data = AssetReposity::getInstance()->delete($request);
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

<?php

namespace App\Factory\Repository\Asset;

use App\Factory\Validation\InterfaceBasic;
use App\Repository\Asset\AssetsRepository;

class AssetReposity implements InterfaceBasic
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
        $data = AssetsRepository::getInstance()->getAll();
        return $data;
    }

    public function responseSpecify($request)
    {
        $data = AssetsRepository::getInstance()->getSpecify($request);
        return $data;
    }

    public function responsesSpecifyAssetByAssetID($request)
    {
        $data = AssetsRepository::getInstance()->getSpecifyByAssetID($request);
        return $data;
    }

    public function insert($request)
    {
        $data = AssetsRepository::getInstance()->insert($request);
        return $data;
    }

    public function update($request)
    {
        $data = AssetsRepository::getInstance()->update($request);
        return $data;
    }

    public function delete($request)
    {
        $data = AssetsRepository::getInstance()->delete($request);
        return $data;
    }
}

<?php

namespace App\Factory\Repository\User;

use App\Factory\Repository\AbstractFactory;
use App\Factory\Repository\User\UserReposity;
use App\Utils\ResponseStatusUtils;
use App\Utils\Utils;

class UserRepositoryFactory extends AbstractFactory
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
                $data = UserReposity::getInstance()->responseAll($request);
                break;
            case 'responsesSpecifyAsset':
                $data = UserReposity::getInstance()->responseSpecify($request);
                break;
            case 'insertAsset':
                $data = UserReposity::getInstance()->insert($request);
                break;
            case 'updateAsset':
                $data = UserReposity::getInstance()->update($request);
                break;
            case 'deleteAsset':
                $data = UserReposity::getInstance()->delete($request);
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

<?php

namespace App\Factory\Repository\Record;

use App\Factory\Repository\AbstractFactory;
use App\Factory\Repository\Record\RecordReposity;
use App\Utils\ResponseStatusUtils;
use App\Utils\Utils;

class RecordRepositoryFactory extends AbstractFactory
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
            case 'responsesAllRecords':
                $data = RecordReposity::getInstance()->responseAll($request);
                break;
            case 'responsesSpecifyRecord':
                $data = RecordReposity::getInstance()->responseSpecify($request);
                break;
            case 'insertRecord':
                $data = RecordReposity::getInstance()->insert($request);
                break;
            case 'deleteRecord':
                $data = RecordReposity::getInstance()->delete($request);
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

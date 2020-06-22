<?php

namespace App\Factory\Repository\Record;

use App\Factory\Validation\InterfaceBasic;
use App\Repository\Record\RecordsRepository;

class RecordReposity implements InterfaceBasic
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
        $data = RecordsRepository::getInstance()->getAll();
        return $data;
    }

    public function responseSpecify($request)
    {
        $data = RecordsRepository::getInstance()->getSpecify($request);
        return $data;
    }

    public function responsesFilterRecords($request) {
        $data = RecordsRepository::getInstance()->getFilter($request);
        return $data;
    }

    public function responsesAmountRecords($request) {
        $data = RecordsRepository::getInstance()->getAmount($request);
        return $data;
    }

    public function insert($request)
    {
        $data = RecordsRepository::getInstance()->insert($request);
        return $data;
    }

    public function update($request)
    {
        $data = RecordsRepository::getInstance()->update($request);
        return $data;
    }

    public function delete($request)
    {
        $data = RecordsRepository::getInstance()->delete($request);
        return $data;
    }
}

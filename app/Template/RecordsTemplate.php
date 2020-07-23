<?php

namespace App\Template;

use App\Factory\Repository\Record\RecordRepositoryFactory;
use App\Factory\Validation\Record\RecordValidationFactory;
use App\Services\RecordsServices;
use App\Template\BaseTemplate;

class RecordsTemplate extends BaseTemplate
{
    private $request;
    private $name;

    public function __construct($request, $name)
    {
        $this->request = $request;
        $this->name = $name;
    }

    public function callValidation()
    {
        $validation = RecordValidationFactory::getInstance()->doValidation($this->request, $this->name);
        return $validation;
    }

    public function callServices()
    {
        RecordsServices::getInstance()->checkTenantExist($this->request);
    }

    public function callRepository()
    {
        $data = RecordRepositoryFactory::getInstance()->doQuery($this->request, $this->name);
        return $data;
    }

    public function callModelRelations($data)
    {
        foreach ($data as $item) {
            $item->items_records = $item->items_records;
        }
        return $data;
    }
}

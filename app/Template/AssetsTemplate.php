<?php

namespace App\Template;

use App\Factory\Repository\Asset\AssetRepositoryFactory;
use App\Factory\Validation\Asset\AssetValidationFactory;
use App\Template\BaseTemplate;

class AssetsTemplate extends BaseTemplate
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
        $validation = AssetValidationFactory::getInstance()->doValidation($this->request, $this->name);
        return $validation;
    }

    public function callServices()
    {
        // 
    }

    public function callRepository()
    {
        $data = AssetRepositoryFactory::getInstance()->doQuery($this->request, $this->name);
        return $data;
    }

    public function callModelRelations($data)
    {
        return $data;
    }
}

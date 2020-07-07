<?php

namespace App\Template;

use App\Factory\Repository\Auth\AuthRepositoryFactory;
use App\Factory\Validation\Auth\AuthValidationFactory;
use App\Template\BaseTemplate;

class AuthTemplate extends BaseTemplate
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
        $validation = AuthValidationFactory::getInstance()->doValidation($this->request, $this->name);
        return $validation;
    }

    public function callServices()
    {
        // 
    }

    public function callRepository()
    {
        $data = AuthRepositoryFactory::getInstance()->doQuery($this->request, $this->name);
        return $data;
    }

    public function callModelRelations($data)
    {
        return $data;
    }
}

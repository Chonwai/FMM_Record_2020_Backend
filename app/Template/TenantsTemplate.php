<?php

namespace App\Template;

use App\Factory\Repository\Tenant\TenantRepositoryFactory;
use App\Factory\Validation\Tenant\TenantValidationFactory;
use App\Template\BaseTemplate;

class TenantsTemplate extends BaseTemplate
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
        $validation = TenantValidationFactory::getInstance()->doValidation($this->request, $this->name);
        return $validation;
    }

    public function callServices()
    {
        // 
    }

    public function callRepository()
    {
        $data = TenantRepositoryFactory::getInstance()->doQuery($this->request, $this->name);
        return $data;
    }

    public function callModelRelations($data)
    {
        return $data;
    }
}

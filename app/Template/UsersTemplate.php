<?php

namespace App\Template;

use App\Factory\Repository\User\UserRepositoryFactory;
use App\Factory\Validation\User\UserValidationFactory;
use App\Template\BaseTemplate;

class UsersTemplate extends BaseTemplate
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
        $validation = UserValidationFactory::getInstance()->doValidation($this->request, $this->name);
        return $validation;
    }

    public function callServices()
    {
        // 
    }

    public function callRepository()
    {
        $data = UserRepositoryFactory::getInstance()->doQuery($this->request, $this->name);
        return $data;
    }

    public function callModelRelations($data)
    {
        return $data;
    }
}

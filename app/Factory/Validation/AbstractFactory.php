<?php

namespace App\Factory\Validation;

abstract class AbstractFactory
{
    abstract public function doValidation($request, $name);
}

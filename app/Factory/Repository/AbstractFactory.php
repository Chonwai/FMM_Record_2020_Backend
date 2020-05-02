<?php

namespace App\Factory\Repository;

abstract class AbstractFactory
{
    abstract public function doQuery($request, $name);
}

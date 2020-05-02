<?php

namespace App\Template;

use App\Utils\ResponseStatusUtils;
use App\Utils\Utils;

abstract class BaseTemplate
{
    abstract public function callValidation();
    abstract public function callServices();
    abstract public function callRepository();
    abstract public function callModelRelations($data);

    public function integradeMessage($data)
    {
        if ($data) {
            $res = Utils::integradeResponseMessage($data, true);
            return $res;
        } else {
            $res = Utils::integradeResponseMessage(ResponseStatusUtils::fail(), false);
            return $res;
        }
    }
}

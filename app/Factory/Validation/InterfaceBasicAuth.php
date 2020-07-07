<?php

namespace App\Factory\Validation;

interface InterfaceBasicAuth
{
    public function login($request);
    public function registration($request);
}

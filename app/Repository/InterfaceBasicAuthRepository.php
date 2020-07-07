<?php

namespace App\Repository;

interface InterfaceBasicAuthRepository
{
    public function login($request);
    public function registration($request);
}

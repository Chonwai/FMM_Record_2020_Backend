<?php

namespace App\Factory\Validation;

interface InterfaceBasic
{
    public function responseAll();
    public function responseSpecify($request);
    public function insert($request);
    public function update($request);
    public function delete($request);
}

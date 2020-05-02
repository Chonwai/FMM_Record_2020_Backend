<?php

namespace App\Http\Requests;

interface BaseRules
{
    public function responseSpecifyRules();
    public function insertRules();
    public function updateRules();
    public function deleteRules();
}

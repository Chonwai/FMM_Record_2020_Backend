<?php

namespace App\Repository;

interface InterfaceBasicRepository
{
    public function getAll();
    public function getSpecify($request);
    public function insert($request);
    public function update($request);
    public function delete($request);
}

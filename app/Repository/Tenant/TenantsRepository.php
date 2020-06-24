<?php

namespace App\Repository\Tenant;

use App\Models\Tenants;
use App\Repository\InterfaceBasicRepository;
use EloquentBuilder;

class TenantsRepository implements InterfaceBasicRepository
{
    /**
     * Create the Singleton Pattern
     *
     * @return object
     */
    private static $_instance = null;

    private function __construct()
    {
        // Avoid constructing this class on the outside.
    }

    public static function getInstance()
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function getAll()
    {
        $data = Tenants::orderBy('id', 'desc')->paginate(20);
        return $data;
    }

    public function getSpecify($request)
    {
        $data = Tenants::where('id', '=', $request->id)->get();
        return $data;
    }

    public function getSpecifyBySearchFilter($request) {
        $data = EloquentBuilder::to(Tenants::class, $request->all())->first();
        return $data;
    }

    public function insert($request)
    {
        $data = Tenants::create($request->all());
        return $data;
    }

    public function update($request)
    {
        $data = Tenants::where('id', '=', $request->id)->update($request->all());
        return $data;
    }

    public function delete($request)
    {
        $data = Tenants::where('id', '=', $request->id)->delete();
        return $data;
    }
}

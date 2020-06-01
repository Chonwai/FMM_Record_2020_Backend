<?php

namespace App\Repository\Asset;

use App\Models\Assets;
use App\Repository\InterfaceBasicRepository;

class AssetsRepository implements InterfaceBasicRepository
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
        $data = Assets::orderBy('id')->paginate(20);
        return $data;
    }

    public function getSpecify($request)
    {
        $data = Assets::where('id', '=', $request->id)->get();
        return $data;
    }

    public function insert($request)
    {
        //
    }

    public function update($request)
    {
        //
    }

    public function delete($request)
    {
        $data = Assets::where('id', '=', $request->id)->delete();
        return $data;
    }
}

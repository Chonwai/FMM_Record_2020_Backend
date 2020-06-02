<?php

namespace App\Repository\User;

use App\Models\Users;
use App\Repository\InterfaceBasicRepository;

class UsersRepository implements InterfaceBasicRepository
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
        $data = Users::orderBy('id', 'desc')->paginate(20);
        return $data;
    }

    public function getSpecify($request)
    {
        $data = Users::where('id', '=', $request->id)->get();
        return $data;
    }

    public function insert($request)
    {
        $data = Users::create($request->all());
        return $data;
    }

    public function update($request)
    {
        $data = Users::where('id', '=', $request->id)->update($request->all());
        return $data;
    }

    public function delete($request)
    {
        $data = Users::where('id', '=', $request->id)->delete();
        return $data;
    }
}

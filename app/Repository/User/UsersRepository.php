<?php

namespace App\Repository\User;

use App\Models\Users;
use App\Repository\InterfaceBasicRepository;
use Carbon\Carbon;
use EloquentBuilder;
use Illuminate\Support\Str;

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
        $data = Users::create([
            'id' => Str::uuid(),
            'staff_or_student_number' => $request->staff_or_student_number,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'name' => $request->name,
            'contact' => $request->contact,
            'last_actived_at' => Carbon::now(),
            'is_admin' => false,
            'records_count' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
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

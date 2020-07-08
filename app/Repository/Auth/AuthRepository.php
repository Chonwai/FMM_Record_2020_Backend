<?php

namespace App\Repository\Auth;

use App\Models\Users;
use App\Repository\InterfaceBasicAuthRepository;
use App\Utils\ResponseStatusUtils;
use App\Utils\Utils;
use Illuminate\Support\Facades\Auth;
use JWTAuth;

class AuthRepository implements InterfaceBasicAuthRepository
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

    public function login($request)
    {
        $input = $request->only('email', 'password');
        $token = null;

        if (!$token = JWTAuth::attempt($input)) {
            return ResponseStatusUtils::passwordIncorrect();
        } else {
            $token = Utils::responseWithToken($token);
            $currentUser['user_details'] = Auth::user();
            $currentUser['token'] = $token;
        }

        return $currentUser;
    }

    public function registration($request)
    {
        $data = Users::where('id', '=', $request->id)->get();
        return $data;
    }
}

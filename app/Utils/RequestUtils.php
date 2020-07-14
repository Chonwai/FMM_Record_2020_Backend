<?php

namespace App\Utils;

use App\Utils\JWTUtils;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RequestUtils
{
    public static function addUserID(Request $request)
    {
        $request->request->add(['user_id' => JWTUtils::getUserID()]);
    }

    public static function addUserIDForUserTable(Request $request)
    {
        $request->request->add(['id' => JWTUtils::getUserID()]);
    }

    public static function addRandomPassword(Request $request)
    {
        $request->request->add(['password' => Str::random(15)]);
    }
}

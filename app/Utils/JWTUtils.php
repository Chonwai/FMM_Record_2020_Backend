<?php

namespace App\Utils;

use Tymon\JWTAuth\Facades\JWTAuth;

class JWTUtils
{
    public static function getToken()
    {
        return JWTAuth::getToken();
    }

    public static function getPayload($token)
    {
        return JWTAuth::getPayload($token);
    }

    public static function getSub($token)
    {
        return JWTAuth::getPayload($token)['sub'];
    }

    public static function getIss($token)
    {
        return JWTAuth::getPayload($token)['iss'];
    }

    public static function getUserID()
    {
        return JWTAuth::getPayload(JWTAuth::getToken())['sub'];
    }

    public static function hasToken()
    {
        if (self::getToken() == null) {
            return false;
        } elseif (self::getToken() != null) {
            return true;
        }
    }
}

<?php

namespace App\Utils;

use Carbon\Carbon;

class Utils
{
    public static function integradeResponseMessage($message, $status)
    {
        $response = [];
        $response['status'] = $status;
        $response['message'] = $message;
        return $response;
    }

    public static function responseWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() / 60 / 24 . " Days",
        ];
    }
}

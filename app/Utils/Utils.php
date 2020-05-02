<?php

namespace App\Utils;

class Utils
{
    public static function integradeResponseMessage($message, $status)
    {
        $response = [];
        $response['status'] = $status;
        $response['message'] = $message;
        return $response;
    }
}

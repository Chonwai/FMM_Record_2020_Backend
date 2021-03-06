<?php

namespace App\Utils;

class ResponseStatusUtils
{
    public static function success()
    {
        return 'Success';
    }

    public static function fail()
    {
        return 'Fail';
    }

    public static function APINoFound()
    {
        return 'API Not Found';
    }

    public static function exceptionMessage($exception)
    {
        return $exception->getMessage();
    }

    public static function validatorErrorMessage($validator)
    {
        return $validator->errors()->messages();
    }

    public static function passwordIncorrect()
    {
        return 'Password Incorrect';
    }

    public static function unknownProblems()
    {
        return 'Unknown Problems';
    }

    public static function wrongConfirmationCode()
    {
        return 'Wrong Confirmation Code';
    }

    public static function throwableMessage($th)
    {
        return $th->getMessage();
    }

    public static function notEnoughCredit()
    {
        return 'Not Enough Credit';
    }

    public static function tokenExpired()
    {
        return 'Token has expired';
    }
}

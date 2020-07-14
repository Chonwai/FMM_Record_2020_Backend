<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Utils\RequestUtils;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function responsesOwner(Request $request)
    {
        RequestUtils::addUserIDForUserTable($request);

        
    }
}

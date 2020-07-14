<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Template\UsersTemplate;
use App\Utils\RequestUtils;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function responsesOwner(Request $request)
    {
        RequestUtils::addUserIDForUserTable($request);

        $template = new UsersTemplate($request, 'responsesSpecifyUser');
        $validation = $template->callValidation();

        if ($validation != 1) {
            return $validation;
        }

        $service = $template->callServices();

        $data = $template->callRepository();

        $data = $template->callModelRelations($data);

        $data = $template->integradeMessage($data);

        return $data;
    }
}

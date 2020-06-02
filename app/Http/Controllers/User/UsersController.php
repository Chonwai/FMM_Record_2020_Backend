<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Template\UsersTemplate;

class UsersController extends Controller
{
    public function responsesAllUsers(Request $request) {
        $template = new UsersTemplate($request, 'responsesAllUsers');
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

    public function responsesSpecifyUser(Request $request) {
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

    public function insertUser(Request $request) {
        $template = new UsersTemplate($request, 'insertUser');
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

    public function updateUser(Request $request) {
        $template = new UsersTemplate($request, 'updateUser');
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

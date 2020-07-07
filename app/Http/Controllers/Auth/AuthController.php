<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Template\AuthTemplate;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public $loginAfterSignUp = true;

    public function login(Request $request) {
        $template = new AuthTemplate($request, 'login');

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

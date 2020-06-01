<?php

namespace App\Http\Controllers\Asset;

use App\Http\Controllers\Controller;
use App\Template\AssetsTemplate;
use Illuminate\Http\Request;

class AssetsController extends Controller
{
    public function responsesAllAssets(Request $request) {
        $template = new AssetsTemplate($request, 'responsesAllAssets');
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

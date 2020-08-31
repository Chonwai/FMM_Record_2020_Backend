<?php

namespace App\Http\Controllers\Asset;

use App\Http\Controllers\Controller;
use App\Template\AssetsTemplate;
use Illuminate\Http\Request;

class AssetsController extends Controller
{
    public function responsesAllAssets(Request $request)
    {
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

    public function responsesSpecifyAsset(Request $request)
    {
        $template = new AssetsTemplate($request, 'responsesSpecifyAsset');
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

    public function responsesSpecifyAssetByAssetID(Request $request)
    {
        $template = new AssetsTemplate($request, 'responsesSpecifyAssetByAssetID');
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

    public function insertAsset(Request $request)
    {
        $template = new AssetsTemplate($request, 'insertAsset');
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

    public function updateAsset(Request $request)
    {
        $template = new AssetsTemplate($request, 'updateAsset');
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

    public function deleteAsset(Request $request)
    {
        $template = new AssetsTemplate($request, 'deleteAsset');
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

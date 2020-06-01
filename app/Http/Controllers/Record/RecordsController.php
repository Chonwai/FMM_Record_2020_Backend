<?php

namespace App\Http\Controllers\Record;

use App\Http\Controllers\Controller;
use App\Template\RecordsTemplate;
use Illuminate\Http\Request;

class RecordsController extends Controller
{
    public function responsesAllRecords(Request $request)
    {
        $template = new RecordsTemplate($request, 'responsesAllRecords');
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

    public function responsesSpecifyRecord(Request $request)
    {
        $template = new RecordsTemplate($request, 'responsesSpecifyRecord');
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

    public function insertRecord(Request $request)
    {
        $template = new RecordsTemplate($request, 'insertRecord');
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

    public function updateRecord(Request $request) {
        $template = new RecordsTemplate($request, 'updateRecord');
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

    public function deleteRecord(Request $request)
    {
        $template = new RecordsTemplate($request, 'deleteRecord');
        $validation = $template->callValidation();

        if ($validation != 1) {
            return $validation;
        }

        $service = $template->callServices();

        $data = $template->callRepository();

        $data = $template->integradeMessage($data);

        return $data;
    }
}

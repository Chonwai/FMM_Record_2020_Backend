<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Template\TenantsTemplate;

class TenantsController extends Controller
{
    public function responsesAllTenants(Request $request) {
        $template = new TenantsTemplate($request, 'responsesAllTenants');
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

    public function responsesSpecifyTenant(Request $request) {
        $template = new TenantsTemplate($request, 'responsesSpecifyTenant');
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

    public function insertTenant(Request $request) {
        $template = new TenantsTemplate($request, 'insertTenant');
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

    public function updateTenant(Request $request) {
        $template = new TenantsTemplate($request, 'updateTenant');
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

    public function deleteTenant(Request $request) {
        $template = new TenantsTemplate($request, 'deleteTenant');
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

<?php

namespace App\Http\Requests\Tenant;

use App\Http\Requests\BaseRules;
use Illuminate\Foundation\Http\FormRequest;

class TenantsRules extends FormRequest implements BaseRules
{
    /**
     * Create the Singleton Pattern
     *
     * @return object
     */
    private static $_instance = null;

    private function __construct()
    {
        // Avoid constructing this class on the outside.
    }

    public static function getInstance()
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function responseSpecifyRules()
    {
        return [
            'id' => 'required|exists:tenants,id',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function insertRules()
    {
        return [
            'name' => 'required',
            'email' => 'nullable|email',
            'contact' => 'required',
            'staff_number' => 'required',
            'department' => 'required',
            'status' => 'required',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function updateRules()
    {
        return [
            'name' => 'required',
            'email' => 'nullable|email',
            'contact' => 'required',
            'staff_number' => 'required',
            'department' => 'required',
            'status' => 'required',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function deleteRules()
    {
        return [
            'id' => 'exists:tenants,id',
        ];
    }
}

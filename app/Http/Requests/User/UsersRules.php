<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRules;
use Illuminate\Foundation\Http\FormRequest;

class UsersRules extends FormRequest implements BaseRules
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
            'id' => 'required|exists:users,id',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function responseSpecifyRules() {
        return [
            'id' => 'required|exists:users,id',
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
            'staff_or_student_number' => 'required|unique:users,staff_or_student_number',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'name' => 'required',
            'contact' => 'required|unique:users,contact',
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
            // 
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
            'id' => 'exists:records,id',
        ];
    }
}

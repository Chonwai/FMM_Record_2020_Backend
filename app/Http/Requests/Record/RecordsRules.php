<?php

namespace App\Http\Requests\Record;

use App\Http\Requests\BaseRules;
use Illuminate\Foundation\Http\FormRequest;

class RecordsRules extends FormRequest implements BaseRules
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
            'id' => 'required|exists:records,id',
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
            'taken_by' => 'required',
            'taken_at' => 'required',
            'staff_number' => 'required',
            'department' => 'required',
            'contact' => 'required',
            'status' => 'required',
            'is_returned' => 'required',
            'remark' => 'nullable',
            'hired_out_by' => 'required',
            'hired_out_at' => 'date',
            'returned_by' => 'nullable',
            'returned_at' => 'nullable|date',
            'items_records' => 'required',
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
            'id' => 'exists:records,id',
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

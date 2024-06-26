<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'             => 'required|string|between:2,100',
            'email'            => 'required|string|email:filter|max:100|unique:admins',
            'password'         => 'required|string|min:8',
            'status'           => 'required|integer',
            'admin_type_id'    => 'required|integer',
        ];
    }
}

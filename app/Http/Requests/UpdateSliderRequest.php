<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSliderRequest extends FormRequest
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
            "slider_group_id"      => 'required|integer',
            "title"         => 'required|string|max:255',
            "target_link"   => 'required|url',
            "target_type"   => 'required|string',
            "sequence"      => 'required|integer',
            "status"        => 'required|string',
            'file_name'     => 'required',
        ];
    }
}

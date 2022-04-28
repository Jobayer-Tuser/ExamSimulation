<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnswerRequest extends FormRequest
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
            'parent_category_id'    => 'required|integer',
            'test_id'               => 'required|array',
            'question_details'      => 'required|string',
            'answer_type'           => 'required|string',
            'text_options'          => 'sometimes|array',
            'image_options'         => 'sometimes|array',
            'correct_answer'        => 'required|array',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'correct_answer.required' => 'You have to select correct answer',
        ];
    }
}

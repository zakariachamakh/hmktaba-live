<?php

namespace App\Http\Requests\Api\Hrm\Holiday;

use Illuminate\Foundation\Http\FormRequest;

class MarkHolidayRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            'date' => 'required',
            'date_from' => 'required',
            'date_to' => 'required',
            'ocassion_name' => 'required',
        ];

        return $rules;
    }
}

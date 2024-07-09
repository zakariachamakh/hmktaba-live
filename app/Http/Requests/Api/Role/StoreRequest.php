<?php

namespace App\Http\Requests\Api\Role;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        $company = company();

        $rules = [
            'name'    => [
                'required', 'not_in:admin',
                Rule::unique('roles', 'name')->where(function ($query) use ($company) {
                    return $query->where('company_id', $company->id);
                })
            ],
            'display_name' => 'required',
            'permissions' => 'required'
        ];

        return $rules;
    }
}

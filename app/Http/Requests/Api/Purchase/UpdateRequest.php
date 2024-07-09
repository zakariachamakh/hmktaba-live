<?php

namespace App\Http\Requests\Api\Purchase;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Vinkla\Hashids\Facades\Hashids;

class UpdateRequest extends FormRequest
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
        $loggedUser = auth('api')->user();
        $convertedId = Hashids::decode($this->route('purchase'));
        $id = $convertedId[0];

        $rules = [
            'order_date' => 'required',
            'user_id' => 'required',
            'order_status' => 'required',
            'product_items'    => 'required',
        ];

        if ($this->has('invoice_number') && $this->invoice_number != '') {
            $rules['invoice_number'] = [
                'required',
                Rule::unique('orders', 'invoice_number')->where(function ($query) use ($company, $id) {
                    return $query->where('company_id', $company->id)
                        ->where('id', '!=', $id);
                })
            ];
        } else {
            $rules['invoice_number'] = 'required';
        }

        return $rules;
    }
}

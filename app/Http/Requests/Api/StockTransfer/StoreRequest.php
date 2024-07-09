<?php

namespace App\Http\Requests\Api\StockTransfer;

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
            'order_status' => 'required',
            'product_items'    => 'required',
            'order_date'    => 'required',
            'warehouse_id'    => 'required',
        ];

        if ($this->invoice_number && $this->invoice_number != '') {
            $rules['invoice_number'] = [
                'required',
                Rule::unique('orders', 'invoice_number')->where(function ($query) use ($company) {
                    return $query->where('company_id', $company->id);
                })
            ];
        }

        return $rules;
    }
}

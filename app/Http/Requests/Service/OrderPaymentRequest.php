<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\ServicePriceValidate;

class OrderPaymentRequest extends FormRequest
{
    /**
     * Determine if the frontend is authorized to make this request.
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
            'order_amount' => 'required|min:1|max:300|numeric'
        ];
    }
}

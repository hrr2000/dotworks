<?php

namespace App\Http\Requests\User\Order;

use App\Models\Order\Order;
use App\Models\Order\OrderState;
use Illuminate\Foundation\Http\FormRequest;

class StartDeliveryRequest extends FormRequest
{
    /**
     * Determine if the frontend is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $order = Order::findOrFail($this->id);
        return $order->provider_id === auth()->user()->id && $order->state_id === OrderState::PROGRESS;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }
}

<?php

namespace App\Http\Requests\User\Service;

use App\Models\Service\Service;
use Illuminate\Foundation\Http\FormRequest;

class DestroyServiceRequest extends FormRequest
{
    /**
     * Determine if the frontend is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        $service = Service::findOrFail($this->id);
        return auth()->user()->id == $service->user_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [];
    }
}

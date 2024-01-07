<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'first_name' => 'string|max:25',
            'second_name' => 'string|max:25',
            'photo' => 'mimes:jpeg,png,jpg,gif,svg',
            'job' => 'string|max:40|nullable',
            'description' => 'string|nullable',
            'country' => 'exists:countries,name',
            'language' => 'in:en,ar',
            'university' => 'string|nullable',
            'response' => 'integer|nullable|min:1',
            'time' => 'in:none,minute,hour,day'
        ];
    }
}

<?php

namespace App\Http\Requests\User\Service;

use App\Models\Service\Service;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\ServicePriceValidate;

class UpdateServiceRequest extends FormRequest
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
        $rules = [
            'title' => 'required|max:80|string',
            'overview' => 'required|max:80|string',
            'description' => 'required|string',
            'guarantee' => 'required|numeric|in:0, 1, 7, 30, 365',
            'price' => ['required', new ServicePriceValidate()],
            'category' => 'required|exists:categories,id',
            'images' => 'required',
            'images.*' => 'required|string|max:100'
        ];

        $packages = [
            'basic',
            'standard',
            'premium'
        ];

        foreach($packages as $package) {
            if($this[$package . '_switch']) {
                $rules = array_merge($rules, [
                    $package . '_package_title' => 'required|string|max:50',
                    $package . '_package_price' => 'required|numeric',
                    $package . '_package_desc' => 'required|string|max:240',
                    $package . '_package_duration' => 'required|string|max:240',
                    $package . '_package_reviews' => 'required|string|max:240',
                ]);

                $offers = $this[$package . '_offers'];
                if($offers)
                    foreach($offers as $key => $offer) {
                        if(!array_key_exists('value', $offer)) continue;

                        $rules = array_merge($rules, [
                            $package . '_offers.'.$key.'.value' => 'required|string|max:80',
                        ]);

                    }

            }
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        $messages = [
            'images.*.required' => 'Please upload at least 1 image.',
            'images.*.mimes' => 'Please upload valid images.',
            'images.*.max' => 'image size must not exceed 2MB.',
        ];

        $packages = [
            'basic',
            'standard',
            'premium'
        ];

        foreach($packages as $package) {
            if($this[$package . '_switch']) {
                $offers = $this[$package . '_offers'];
                if($offers)
                    foreach($offers as $key => $offer) {
                        if(!array_key_exists('value', $offer)) continue;

                        $messages = array_merge($messages, [
                            $package . '_offers.'.$key.'.value.required' => 'this field is required',
                            $package . '_offers.'.$key.'.value.string' => 'please use right characters',
                            $package . '_offers.'.$key.'.value.max' => 'must not exceed 80 letter',
                        ]);
                    }
            }
        }

        return $messages;
    }

}

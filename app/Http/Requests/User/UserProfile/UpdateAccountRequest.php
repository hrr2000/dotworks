<?php

namespace App\Http\Requests\User\UserProfile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountRequest extends FormRequest
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

        $requestRules = [
            'email' => 'required|email'
        ];

        if($this->account_old_password || $this->account_new_password || $this->account_confirm_new_password) {
            $requestRules['account_old_password'] = 'required';
            $requestRules['account_new_password'] = 'required|min:8';
            $requestRules['account_confirm_new_password'] = 'required|same:account_new_password';
        }

        if($this->settings_old_password || $this->settings_new_password || $this->settings_confirm_new_password) {
            $requestRules['settings_old_password'] = 'required';
            $requestRules['settings_new_password'] = 'required|min:8';
            $requestRules['settings_confirm_new_password'] = 'required|same:settings_new_password';
        }


        return $requestRules;
    }
}

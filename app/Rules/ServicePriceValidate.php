<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ServicePriceValidate implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {

        return (is_numeric($value)) && ($value == 5 || $value % 10 === 0) && ($value <= 250 && $value >= 5);

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return __('validation.custom.service_price');
    }
}

<?php

namespace App\Rules;
use Illuminate\Contracts\Validation\Rule;

class ValidHour implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $value >= '08:00' && $value <= '18:00';
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be between 08:00 and 18:00.';
    }
}


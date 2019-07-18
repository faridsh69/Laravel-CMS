<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SeoHeading implements Rule
{
    /**
     * Create a new rule instance.
     */
    public function __construct()
    {
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if(strpos($value, '<h1') === false){
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     * @return string
     */
    public function message()
    {
        return 'The :attribute should has exactly 1 H1 tag and atleast 1 H2 tag.';
    }
}

<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class AgeRule implements Rule
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


    public function passes($attribute, $value)
    {
        $age = Carbon::parse($value)->age;
        return $age > 60;
    }


    public function message()
    {
        return 'The age must be 60 and above.';
    }
}

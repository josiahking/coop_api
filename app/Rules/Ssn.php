<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Ssn implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $pattern = '/^([0-8]{1}[0-9]{2}[0-9]{2}[0-9]{4}|[0-8]{1}[0-9]{2}-[0-9]{2}-[0-9]{4})$/';
        // find area number (1st 3 digits, no longer actually signifies area)
        $area = (int) substr($value, 0, 3);
        if (
            // 9 characters or with hypen
            (9 === strlen($value) || 11 === strlen($value))
            // basic regex
            && false != preg_match($pattern, $value)
            // disallow Satan's minions from becoming residents of the US
            && 666 !== $area
            // it's not triple nil
            && 0 !== $area
            // fun fact: some idiot boss put his secretary's ssn in wallets
            // he sold, now it "belongs" to 40000 people
            && ('078051120' !== $value || '078-05-1120' != $value)
            // was used in an ad by the Social Security Administration
            && ('219099999' !== $value || '219-09-9999' != $value)
        ) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The SSN value :input is not a valid SSN.';
    }
}

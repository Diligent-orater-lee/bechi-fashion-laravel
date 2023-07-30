<?php

namespace App\Rules;

use App\Models\VerseDetails;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueVerseName implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        VerseDetails::where('verse_name', $value)->first() ? $fail('Verse name already exists!') : null;
    }
}

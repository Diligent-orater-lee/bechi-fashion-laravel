<?php

namespace App\Rules;

use App\Models\VerseDetails;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidVerseHandle implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!$this->isVerseValid($value)) {
            $fail('Verse name is not valid!');
        } else if (!$this->isVerseHandleUnique($value)) {
            $fail('Verse name already exists!');
        }
    }

    private function isVerseValid(string $verseHandle) {
        return preg_match('/[A-Za-z0-9](?:[A-Za-z0-9\-]{0,61}[A-Za-z0-9])?/', $verseHandle);
    }

    private function getVerseDetails(string $verseHandle): VerseDetails | null
    {
        return VerseDetails::where('verse_handle', $verseHandle)->first();
    }

    private function isVerseHandleUnique(string $verseHandle): bool
    {
        return $this->getVerseDetails($verseHandle) ? false : true;
    }
}

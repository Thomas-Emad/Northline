<?php

namespace App\Models\Concerns;

trait Translatable
{
    /**
     * Resolve a JSON {"en": "...", "ar": "..."} attribute to the string (or
     * array, for list-type fields like `features`/`results`) for the given
     * locale, falling back to English and then to whatever value exists.
     */
    protected function translated(string $field, ?string $locale = null): mixed
    {
        $value = $this->getAttribute($field);
        $locale = $locale ?: app()->getLocale();

        if (is_array($value) && array_key_exists($locale, $value)) {
            return $value[$locale];
        }

        if (is_array($value) && array_key_exists('en', $value)) {
            return $value['en'];
        }

        if (is_array($value) && ! array_is_list($value)) {
            return reset($value) ?: null;
        }

        return $value;
    }
}

<?php

if (!function_exists('ds')) {
    /**
     * Return directory separator or join partials with it.
     *
     * @param  array $partials
     * @return string
     */
    function ds(...$partials): string
    {
        if (empty($partials)) {
            return DIRECTORY_SEPARATOR;
        }

        return DIRECTORY_SEPARATOR.ltrim(implode(DIRECTORY_SEPARATOR, $partials), DIRECTORY_SEPARATOR);
    }
}

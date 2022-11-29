<?php

namespace App\Core;

/**
 * Encapsulates the $_POST PHP superglobal.
 */
class POST
{
     /**
     * Return the current $_POST array
     */
    public static function all()
    {
        return filter_input_array(INPUT_POST) ?? null;
    }
    /**
     * Returns the value from the array $_POST with the attribute $key
     * @param string $key Index of array $_POST
     */
    public static function key($key)
    {
        return filter_input(INPUT_POST, $key) ?? null;
    }
}
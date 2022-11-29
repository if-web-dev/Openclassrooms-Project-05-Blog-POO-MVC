<?php

namespace App\Core;

/**
 * Encapsulates the $_COOKIE PHP superglobal.
 */
class Cookie
{
    /**
     * Returns the $_COOKIE array
     */
    public static function all()
    {
        return filter_input_array(INPUT_COOKIE) ?? null;
    }
    /**
     * Returns a row of the array $_COOKIE with index $key
     * @param string $key Index of $_COOKIE array
     */
    public static function key($key)
    {
        return filter_input(INPUT_COOKIE, $key) ?? null;
    }
}
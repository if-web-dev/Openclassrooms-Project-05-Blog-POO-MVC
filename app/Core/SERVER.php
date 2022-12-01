<?php

namespace App\Core;

/**
 * Encapsulates the $_SERVER PHP superglobal.
 */
class SERVER
{
     /**
     * Returns $_SERVER array
     */
    public static function all()
    {
        return filter_input_array(INPUT_SERVER) ?? null;
    }
    /**
     * @param string $key Index of $_SERVER array
     */
    public static function key($key)
    {
        return filter_input(INPUT_SERVER, $key) ?? null;
    }
}
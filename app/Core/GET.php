<?php

namespace App\Core;

/**
 * Encapsulates the $_GET PHP superglobal.
 */
class GET
{
     /**
     * Returns the $_GET array
     */
    public static function all()
    {
        return filter_input_array(INPUT_GET) ?? null;
    }
    /**
     * Returns a value from the array $_GET with the attribute $key
     * @param $key Indice du tableau $_GET
     */
    public static function key($key)
    {
        return filter_input(INPUT_GET, $key) ?? null;
    }
}
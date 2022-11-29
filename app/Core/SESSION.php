<?php

namespace App\Core;

/**
 * Class modeling the session.
 * Encapsulates the $_SESSION PHP superglobal.
 */
class Session
{
    /**
     * Constructor.
     * Starts or restore the session
     */
    public function __construct()
    {
        if(!isset($_SESSION)){
            session_start();
        }
    }
    /**
     * Destroys the entire current session
     */
    public static function destroy()
    {
        session_destroy();
    }
    /**
     * Dumps an attribute to the session
     * @param string $name Attribute name
     */
    public static function unset($value)
    {
        if(isset($_SESSION[$value])){
            unset($_SESSION[$value]);
        }
    }
    /**
     * Adds an attribute to the current session
     *
     * @param string $name Attribute name
     * @param string $value Attribute value
     */
    public static function setAttribute($name, $value)
    {
        $_SESSION[$name] = $value;
    }
    /**
     * Returns true if the session attribut exists
     *
     * @param string $name Attribute name
     * @return bool returns true if the attribute exists and if it's not empty
     */
    public static function existsAttribute($name)
    {
        return (isset($_SESSION[$name]) && $_SESSION[$name] != "");
    }
    /**
     * Returns the value of the requested attribute
     *
     * @param string $name Attribute name
     * @return string Attribute value
     * @return bool returns false if the session attribute don't exist
     */
    public static function getAttribute($name)
    {
        if (self::existsAttribute($name)) 
        {
            return $_SESSION[$name];
        }
        else 
        {
            return false;
        }
    }
}
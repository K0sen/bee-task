<?php

namespace app\components;

//Wrapper class for session

class Session
{
    /**
     * @param $key
     * @param $value
     */
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * @param $key
     * @return null
     */
    public static function get($key)
    {
        if (self::has($key)) {
            return $_SESSION[$key];
        }
        return null;
    }

    /**
     * @param $key
     * @return bool
     */
    public static function has($key)
    {
        return isset($_SESSION[$key]);
    }

    /**
     * @param $key
     */
    public static function remove($key)
    {
        unset($_SESSION[$key]);
    }

    /**
     * destroy session
     */
    public static function destroy()
    {
        session_destroy();
    }

    /**
     * start session
     */
    public static function start()
    {
        session_start();
    }

}
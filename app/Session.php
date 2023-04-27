<?php

namespace App;

class Session 
{
    
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {            
            session_start();
        }    
    }
    
    public function get(string $key)
    {
        if ($this->has($key)) {
            return $_SESSION[$key];
        }

        return null;
    }
    
    /**
     * @param string $key
     * @param mixed $value
     * @return SessionManager
     */
    public function set(string $key, $value)
    {
        $_SESSION[$key] = $value;
        return $this;
    }

    public function remove(string $key)
    {
        if ($this->has($key)) {
            unset($_SESSION[$key]);
        }
    }

    public function clear()
    {
        session_unset();
    }

    public function has(string $key)
    {
        return array_key_exists($key, $_SESSION);
    }
}

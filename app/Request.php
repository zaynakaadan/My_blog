<?php

namespace App;

class Request 
{
    private ?array $params = [];
    
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {            
            session_start();
        }
        $safeGet = filter_input_array(INPUT_GET);
        if (!is_array($safeGet)) $safeGet = [];
        $safePost = filter_input_array(INPUT_POST);
        if (!is_array($safePost)) $safePost = [];
        $this->params = count($safePost) ? $safePost : $safeGet;        
    }
    

    public function hasParam($key) {
        return isset($this->params[$key]);
    }

    public function getParam($key) {
        if (isset($this->params[$key])) {
            return $this->params[$key];
        }
        return null;
    }

    public function getParams() {        
        return $this->params;        
    }

    /*public function getGet(): array
    {
        return $this->get;
    }

    public function getPost(): array
    {
        return $this->post;
    }*/

    /* public function getSession(): array
    {
        return $this->session;
    } */



    // MOVED TO SESSION CLASS
    /* 
    public function get(string $key)
    {
        if ($this->has($key)) {
            return $_SESSION[$key];
        }

        return null;
    }
        
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
    } */
}

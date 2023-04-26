<?php

namespace App;

class Request 
{
    private ?array $server = null;
    private ?array $get = null;
    private ?array $post = null;
    private ?array $session = null;


public function __construct()
    {
        $this->server = $_SERVER;
        $this->get = $_GET;
        $this->post = $_POST;
        $this->session = &$_SESSION; // read about references in PHP with &$_SESSION ... 
    }

    public function sanitize($params)
    {
        // $params = array_merge($_GET, $_POST);        
        foreach ($params as $key => $value) { 
            if (is_array($value)) {
                foreach ($value as $k => $v) {
                    if (is_string($v)) {
                        $params[$key][$k] = htmlentities($v);
                    }
                }
            } else {
                $params[$key] = htmlentities($value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
            }
        }
        return $params;
    }

    public function getServer(): array
    {
        return $this->server;
    }

    public function getGet(): array
    {
        return $this->get;
    }

    public function getPost(): array
    {
        return $this->post;
    }

    public function getSession(): array
    {
        return $this->session;
    }
}

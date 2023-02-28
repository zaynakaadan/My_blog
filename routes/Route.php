<?php

namespace Router ;

use Database\DBConnection;

class Route {


    public $path;
    public $action;
    public $matches = [];

    public function __construct($path, $action)
    {
         $this->path = trim($path);
         $this->action = $action;
    }

    public function matches(string $url) 
    {
         $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
         $pathToMatch = "#^$path$#";

         if(preg_match($pathToMatch, $url, $this->matches)) {
            print_r($this->matches);
            return true;
         } else {
            return false;
         }
    }

    public function execute()
    {
      $params = explode('@', $this->action);
      $controller = new $params[0](new DBConnection('projet5', '127.0.0.1', 'root', ''));
      $method = $params[1];

     return isset($this-> matches[1]) ? $controller->$method($this->matches[1]) : $controller->$method();
    }
}
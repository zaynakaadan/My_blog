<?php

namespace App\Controllers;

use Database\DBConnection;

class Controller {

    protected $db;

    public function __construct(DBConnection $db)
    {
        $this->db = $db;
    }

    public function view(string $path, array $params = null)
    {
        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS . $path . '.php';
        $content = ob_get_clean();
        require VIEWS . 'layout.php';
    }

}
<?php 

namespace App\models;

class User extends Model {

    protected $table = 'users';

    public function getByEmail(string $email)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE email = ?", [$email], true);
        
    }
} 
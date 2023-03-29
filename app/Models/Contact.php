<?php 

namespace App\models;

class Contact extends Model {

    protected $table = 'contacts';

    public function getByEmail(string $email)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE email = ?", [$email], true);
        
    }
} 
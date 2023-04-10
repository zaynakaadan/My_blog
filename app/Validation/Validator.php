<?php

namespace App\Validation;

class Validator {

    private $data;
    private $errors;

    public function __construct(array $data)
    {
        $this->data = $data;        
    }

    public function validate(array $rules): ?array
    {
        foreach($rules as $name => $rulesArray) {
           if (array_key_exists($name, $this->data)) {
            foreach ($rulesArray as $rule) {
                switch ($rule) {
                    case 'required':
                        $this->required($name, $this->data[$name]);
                        break;
                    case 'mail':
                        $this->verifyMail($name, $this->data[$name]);

                    case substr($rule, 0, 3) === 'min':
                        $this->min($name, $this->data[$name], $rule);
                     default:

                }
            }
           }
        }
        return $this->getErrors();
    }
    

    private function required(string $name, string $value) 
    {
       $value = trim($value);

       if (!isset($value) || is_null($value) || empty($value)) {
            $this->errors[$name][] = "{$name} est requis";
       }
    }

    private function verifyMail(string $name, string $value)
    {
        if(!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $value))
        {
                $this->errors[$name][] = "L'adresse (".$value.") ne correspond pas à une adresse email";
        }
    }
    private function min(string $name, string $value, string $rule)
    {

        preg_match_all('/(\d+)/', $rule, $matches);
        
        $limit = (int) $matches[0];

        if(strlen($value)< $limit) {
            $this->errors[$name][] = "{$name} doit comprendre un minimum de {$limit} caractères";
        }
    }
    
    private function getErrors(): ?array
    {
        return $this->errors;
    }
}
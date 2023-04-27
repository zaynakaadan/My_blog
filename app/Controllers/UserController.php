<?php 

namespace App\Controllers;

use App\Models\User;
use App\Validation\Validator;


class UserController extends Controller{

   public function login()
   {
     return $this->view('auth.login');
   }

   public function loginPost()
   {  
      $request = new \App\Request();   
      $session = new \App\Session(); 
      $params = $request->getParams();       
      
      $validator = new Validator($params);
      $errors = $validator->validate([
         'email' => ['required', 'min:3'],
         'password'=>  ['required'],
      ]);
      if ($errors) {
         // $session['errors'] [] = $errors;
         $session->set("errors", [$errors]);
         header('Location: /login');
         exit;
      }
      
      $user = (new User($this->getDB()))->getByemail($params['email']);

      
      if(empty($user))
      {
         $errors['email'][] = "Aucun utilisateur n'est enregistré avec cette adresse email !";
         $session->set("errors", [$errors]);
         header('Location: /login');
         exit;
      }
      
      if (password_verify($params['password'], $user->password)) {    
         $session->set("auth", $user->email);
         $session->set("is_admin", $user->is_admin);
         $session->set("user_id", $user->id);
         if ($user->is_admin == 0) {
            return header('Location: /posts');
         } else{
            return header('Location: /admin/posts?success=true');
         }
     } else {
         $errors['password'][] = "Aucun utilisateur n'est enregistré avec cette adresse email et ce mot de passe !";
         $session->set("errors", [$errors]);
         return header('Location: /login');
     }
    
}

    public function logout()
    {
      session_destroy();

      return header('Location: /');
    }

    public function register()
   {  
      return $this->view('auth.register');      
   }

   public function registerPost() 
   {
      $request = new \App\Request();
      $session = new \App\Session();
      $params = $request->getParams();      
        
      $validator = new Validator($params);
      $errors = $validator->validate([
         'gender' => ['required'],
         'first_name'=>  ['required', 'min:3'],
         'last_name'=>  ['required', 'min:3'],
         'email'=>  ['required', 'min:3', 'mail'],
         'password'=>  ['required']
      ]);

      if ($params['password'] != $params['password_confirm']) {
         $errors['password_confirm'][] = "Le mot de passe de confirmation ne correspond pas à votre mot de passe !";
      }

      if ($errors) {
         $session->set("errors", [$errors]);
         // $_SESSION['errors'] [] = $errors;
         header('Location: /register');
         exit;
      }

      $tmpUser = (new User($this->getDB()))->getByemail($params['email']);
      if(!empty($tmpUser)) {
         $errors['email'][] = "Un utilisateur existe déjà avec cette adresse email !";
         $session->set("errors", [$errors]);
         header('Location: /register');
         exit;
      }

      $user = new User($this->getDB());      
      unset($params['password_confirm']);
      $params['password'] = password_hash($params['password'], PASSWORD_DEFAULT);      
      $params['is_admin'] = 1;
      $result = $user->create($params);
      $user = (new User($this->getDB()))->getByemail($params['email']);
      
      if ($result) {
         $session->set("auth", $user->email);
         $session->set("is_admin", $user->is_admin);
         $session->set("user_id", $user->id);         
         return header('Location: /posts');
      } else {      
        return header('Location: /register');
     }
     
   }

}




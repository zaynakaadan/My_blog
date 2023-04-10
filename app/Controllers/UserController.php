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
      foreach($_POST as $k => $p)
        {
            //$_POST[$k] = htmlspecialchars($_POST[$k]);
            $_POST[$k] = strip_tags($_POST[$k]);            
        }

      $validator = new Validator($_POST);
      $errors = $validator->validate([
         'email' => ['required', 'min:3'],
         'password'=>  ['required'],
      ]);

      if ($errors) {
         $_SESSION['errors'] [] = $errors;
         header('Location: /login');
         exit;
      }
      
      $user = (new User($this->getDB()))->getByemail($_POST['email']);

      if(empty($user))
      {
         $errors['email'][] = "Aucun utilisateur n'est enregistré avec cette adresse email !";
         $_SESSION['errors'] [] = $errors;
         header('Location: /login');
         exit;
      }
      
      if (password_verify($_POST['password'], $user->password)) {    
         $_SESSION['auth'] = $user->email;
         $_SESSION['is_admin'] = $user->is_admin;
         $_SESSION['user_id'] = $user->id;

         if ($user->is_admin == 0) {
            return header('Location: /posts');
         }
         else{
            return header('Location: /admin/posts?success=true');
         }
     } else {
         $errors['password'][] = "Aucun utilisateur n'est enregistré avec cette adresse email et ce mot de passe !";
         $_SESSION['errors'] [] = $errors;      
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
      foreach($_POST as $k => $p)
        {
            //$_POST[$k] = htmlspecialchars($_POST[$k]);
            $_POST[$k] = strip_tags($_POST[$k]);            
        }
        
      $validator = new Validator($_POST);
      $errors = $validator->validate([
         'gender' => ['required'],
         'first_name'=>  ['required', 'min:3'],
         'last_name'=>  ['required', 'min:3'],
         'email'=>  ['required', 'min:3', 'mail'],
         'password'=>  ['required']
      ]);

      if ($_POST['password'] != $_POST['password_confirm'])
      {
         $errors['password_confirm'][] = "Le mot de passe de confirmation ne correspond pas à votre mot de passe !";
      }

      if ($errors) {
         $_SESSION['errors'] [] = $errors;
         header('Location: /register');
         exit;
      }

      $user = (new User($this->getDB()))->getByemail($_POST['email']);

      if(!empty($user))
      {
         $errors['email'][] = "Un utilisateur existe déjà avec cette adresse email !";
         $_SESSION['errors'] [] = $errors;
         header('Location: /register');
         exit;
      }

      $user = new User($this->getDB());
      
      unset($_POST['password_confirm']);
      $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
      
      $_POST['is_admin'] = 1;
      $result = $user->create($_POST);
      $user = (new User($this->getDB()))->getByemail($_POST['email']);
      
      if ($result) {
         $_SESSION['auth'] = $user->email;
         $_SESSION['is_admin'] = $user->is_admin;
         $_SESSION['user_id'] = $user->id;
         return header('Location: /posts');
      }
      else {      
        return header('Location: /register');
     }
     
   }

}




<?php 

namespace App\Controllers;

use App\models\User;
use App\models\Contact;
use App\Validation\Validator;



class ContactController extends Controller {
 
    public function contact()
    {
        return $this->view('blog.contact');
    }

    public function contactPost() 
    {
        $validator = new Validator($_POST);
        $errors = $validator->validate([           
           'first_name'=>  ['required', 'min:3'],
           'last_name'=>  ['required', 'min:3'],
           'email'=>  ['required', 'min:3', 'mail'],
           'message'=>  ['required', 'min:3']
        ]);

        if ($errors) {
            $_SESSION['errors'] [] = $errors;
            header('Location: /contact');
            exit;
         }

         $user = (new User($this->getDB()))->getByemail($_POST['email']);

      if(empty($user))
      {
         $errors['email'][] = "Aucun utilisateur n'est enregistré avec cette adresse email !";
         $_SESSION['errors'] [] = $errors;
         header('Location: /register');
         exit;
      }
        $contact = new Contact($this->getDB());   
        $result = $contact->create($_POST);
        $contact = (new Contact($this->getDB()))->getByemail($_POST['email']);
        if ($result) {
            $_SESSION['auth'] = $contact->email;
            $_SESSION['is_admin'] = $contact->is_admin;
            return header('Location: /contact?su=true');
         }
         else {      
           return header('Location: /contact');
        }
    }


}

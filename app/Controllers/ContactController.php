<?php 

namespace App\Controllers;

use App\models\User;
use App\models\Contact;
use PHPMailer\PHPMailer\S;
use App\Validation\Validator;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;


class ContactController extends Controller {
 
    /*public function contact()
    {
        return $this->view('blog.contact');
    }*/

    public function contactPost() 
    {
        $validator = new Validator($_POST);
        $errors = $validator->validate([           
           'first_name'=>  ['required', 'min:3'],
           'last_name'=>  ['required', 'min:3'],
           'email'=>  ['required', 'min:3', 'mail'],
           'sujet'=>  ['required', 'min:3'],
           'message'=>  ['required', 'min:3']
        ]);

        if ($errors) {
            $_SESSION['errors'] [] = $errors;
            header('Location: /');
            exit;
         }  else {             
            $contact = new Contact($this->getDB());   
            
            $result = $contact->create($_POST);

            try {

                $mail = new PHPMailer();

                $mail->CharSet = "UTF-8";
                $mail->Encoding = 'base64';

                $mail->isSMTP();
                $mail->SMTPAuth = true;
                // Informations personnelles
                $mail->Host = "mail.yahoo.com";
                $mail->Port = "465";
                $mail->Username = "zaynakaadan@yahoo.com";
                $mail->Password = "Zozo12345";
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

                $mail->setFrom($_POST["email"], $_POST["first_name"]." ".$_POST["last_name"]);
                $mail->Subject = $_POST["sujet"];
                $mail->isHTML(true);
                $mail->msgHTML($_POST["message"]);

                $mail->addAddress('zaynakaadan@gmail.com');
                $mail->addCC('kourtin_ismahane.math@yahoo.fr');

                if ($mail->send()) {

                    echo 'Mail envoyé avec succèss.';
                    exit;
                } else {
            
                    echo 'Unable to send mail. Please try again.';
                    exit;
                }
            
                header('Location: /?success=true');
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: ".$mail->ErrorInfo;
            }
        }  
    }
}

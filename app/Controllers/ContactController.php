<?php 

namespace App\Controllers;

use App\models\User;
use App\models\Contact;

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
        foreach($_POST as $k => $p)
        {
            //$_POST[$k] = htmlspecialchars($_POST[$k]);
            $_POST[$k] = strip_tags($_POST[$k]);            
        }
        
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
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 587;
                $mail->Username = "zaynakaadan@gmail.com";
                $mail->Password = getenv("MAIL_PASSWD");
                $mail->SMTPDebug = 1;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                //$mail->SMTPSecure = 'ssl';

                $mail->setFrom("zaynakaadan@yahoo.com", $_POST["first_name"]." ".$_POST["last_name"]);
                $mail->addReplyTo($_POST["email"]);
                $mail->Subject = $_POST["sujet"];
                $mail->isHTML(true);     
                $mail->msgHTML($_POST["message"]);

                $mail->addAddress('zaynakaadan@gmail.com');
                $mail->addCC('zaynakaadan@yahoo.com');

                if ($mail->send()) {                    
                    echo 'Mail envoyé avec succèss.';
                    exit;
                } else {
                    //print_r($mail->ErrorInfo);
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

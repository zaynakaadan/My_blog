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
        $request = new \App\Request();    
        $session = new \App\Session();
        $params = $request->getParams();   
                    
        $validator = new Validator($params);
        $errors = $validator->validate([
           'first_name'=>  ['required', 'min:3'],
           'last_name'=>  ['required', 'min:3'],
           'email'=>  ['required', 'min:3', 'mail'],
           'sujet'=>  ['required', 'min:3'],
           'message'=>  ['required', 'min:3']
        ]);
       
        
        if ($errors) {
            $request = new \App\Request(); 
            $session->set('errors', [$errors]);            
             return header('Location: /');
            
         }  else {             
            $contact = new Contact($this->getDB());   
            $result = $contact->create($params);

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

                $mail->setFrom("zaynakaadan@yahoo.com", $params["first_name"]." ".$params["last_name"]);
                $mail->addReplyTo($params["email"]);
                $mail->Subject = $params["sujet"];
                $mail->isHTML(true);     
                $mail->msgHTML($params["message"]);

                $mail->addAddress('zaynakaadan@gmail.com');
                $mail->addCC('zaynakaadan@yahoo.com');

                if ($mail->send()) {                    
                    header('Location: /?success=true');
                } else {
                    //print_r($mail->ErrorInfo);
                    echo 'Unable to send mail. Please try again.';
                    exit;
                }
            
               
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: ".$mail->ErrorInfo;
            }
        }  
    }
}

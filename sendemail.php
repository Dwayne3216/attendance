<?php
    require 'vendor/autoload.php';

    class SendEmail{

        public static function SendMail($to,$subject,$content){
            $key = ''; //KEY GOES HERE!!!!!

            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("oren_white@gmail.com"," Dwayne Whitely");
            $email->setSubject($subject);
            $email->addto($to);
            $email->addContent("text/plain", $content);
                            //OR
           // $email->addContent("text/html", $content);

            $sendgrid = new \SendGrid($key);
            

            try{
                $response = $sendgrid->send($email);

            }catch(Exeption $e){
                echo 'Email exception Caught : '.$e->getMessage() ."\n";
                return false;

            }
        }

    }

?>
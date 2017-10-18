<?php
namespace App;
class Functions
{
    // CONTACT FORM WORKING
    public static function contact()
    {
        $tableError = [];

        if(isset($_POST['sendmsg']))
        {
            $name = $_POST['nom'];
            $firstname = $_POST['prenom'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];

            $tableError[] = ErrorMessage::getNameError($name);
            $tableError[] = ErrorMessage::getFirstnameError($firstname);
            $tableError[] = ErrorMessage::getEmailError($email);
            $tableError[] = ErrorMessage::getSubjectError($subject);
            $tableError[] = ErrorMessage::getMessageError($message);

            if (empty(array_filter($tableError)))
            {
                $to         = "damien.vauchel@gmail.com";
                $subject    = wordwrap($subject, 70);
                $body       = $message;
                $header     = $firstname." ".$name." <".$email.">";

                mail($to, $subject, $body, 'From: '.$header);
                unset($_SESSION['tableError']);
                $_SESSION['mail_sent'] = "OK";
            }
            else
            {
                return $_SESSION['tableError'] = $tableError;
            }
        }
    }

    // CHECK INPUT
    public static function checkInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
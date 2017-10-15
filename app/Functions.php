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

//            die(var_dump($tableError));
            if (empty(array_filter($tableError)))
            {
                $to         = "damien.vauchel@gmail.com";
                $subject    = wordwrap($subject, 70);
                $body       = $message;
                $header     = $firstname." ".$name." <".$email.">";

                mail($to, $subject, $body, 'From: '.$header);
            }
            else
            {
                return $_SESSION['tableError'] = $tableError;
            }
        }
        elseif(isset($_POST['sendmsgModal']))
        {
            $to         = "damien.vauchel@gmail.com";
            $subject    = wordwrap($_POST['subjectModal'], 70);
            $body       = $_POST['messageModal'];
            $header     = $_POST['prenomModal']." ".$_POST['nomModal']." <".$_POST['emailModal'].">";

            mail($to, $subject, $body, 'From: '.$header);
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
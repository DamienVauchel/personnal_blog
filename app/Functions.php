<?php
namespace App;
class Functions
{
    // CONTACT FORM WORKING
    public static function contact()
    {
        if(isset($_POST['sendmsg']))
        {
            $to         = "damien.vauchel@gmail.com";
            $subject    = wordwrap($_POST['subject'], 70);
            $body       = $_POST['message'];
            $header     = $_POST['prenom']." ".$_POST['nom']." <".$_POST['email'].">";

            mail($to, $subject, $body, 'From: '.$header);
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
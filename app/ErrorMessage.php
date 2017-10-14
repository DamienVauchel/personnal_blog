<?php
namespace App;
class ErrorMessage
{
    public $tableError = [];

    public static function getTitleError($title) // Return titleError in tableError if no title
    {
        if(empty($title))
        {
            $titleError = "Ce champ ne peut pas être vide";
            return $tableError[] = ["title" => $titleError];
        }
    }

    public static function getContentError($content) // Return contentError in tableError if no content
    {
        if(empty($content))
        {
            $contentError = "Ce champ ne peut pas être vide";
            return $tableError[] = ["content" => $contentError];
        }
    }

    public static function getAuthorError($author) // Return authorError in tableError if no author
    {
        if(empty($author))
        {
            $authorError = "Ce champ ne peut pas être vide";
            return $tableError[] = ["author" => $authorError];
        }
    }

    public static function getAddPhotoError($photo, $photoExtension, $photoPath) // Return photoError in tableError if no photo
    {
        if(empty($photo))
        {
            $photoError = "Ce champ ne peut pas être vide";
            return $tableError[] = ["photo" => $photoError];
        }
        else {
            if ($photoExtension != "jpg" && $photoExtension != "png" && $photoExtension != "jpeg") {
                $photoError = "Les fichiers autorisés sont: .jpg, .jpeg, .png";
                return $tableError[] = ["photo" => $photoError];
            }

            if (file_exists($photoPath)) {
                $photoError = "Un fichier de ce nom existe déjà. Renommez-le ou chargez un autre fichier";
                return $tableError[] = ["photo" => $photoError];
            }

            if ($_FILES['photo']['size'] > 5000000) {
                $photoError = "Le fichier ne peut pas dépasser les 5 MB";
                return $tableError[] = ["photo" => $photoError];
            }
        }
    }
}
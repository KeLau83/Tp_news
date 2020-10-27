<?php

namespace App\Modele;
use App\Traits\MethodePost;

class FormService {
    use MethodePost {itsNotARequestPost as private;}

    public static function checkFormCreate($formInfo, string& $errorMessage): bool {
        
        if (self::itsNotARequestPost()) {
            return false;
        }

        if(self::unsetTitle($formInfo, $errorMessage)){
            return false;
        }

        if(self::unsetAuthor($formInfo, $errorMessage)){
            return false;
        }

        if(self::unsetContent($formInfo, $errorMessage)){
            return false;
        }

        return true;
    }


    private static function unsetTitle($formInfo, &$errorMessage){
        if(empty($formInfo['title'])){
            $errorMessage = "You need title bro!";
            return true;
        }
    }

    private static function unsetAuthor($formInfo, &$errorMessage){
        if(empty($formInfo['author'])){
            $errorMessage = "Who are you bro?";
            return true;

        }
    }

    private static function unsetContent($formInfo, &$errorMessage){
        if(empty($formInfo['content'])){
            $errorMessage = "Maybe say something bro!";
            return true;
        }
    }
}
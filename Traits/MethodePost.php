<?php
namespace App\Traits;

trait MethodePost {
    public static function itsNotARequestPost () {
        if (!($_SERVER['REQUEST_METHOD'] === 'POST')){
            return true;
        }  
    }
}
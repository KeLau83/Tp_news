<?php
namespace App\Modele;
use \PDO;
use\Exception;

class DbFactory {

    public static function connectToDB() {
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=tp_news;charset=utf8', 'root', '');
            return $bdd;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }    
    }
}
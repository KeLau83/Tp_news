<?php
namespace App\Modele;

use \PDO;
use App\Modele\News;
use App\Modele\DbFactory;
class NewsManager {

    public static function getListNews($db, $number = null) {
        $limit = '';
        if($number){
            $limit = 'LIMIT ' .$number;
        }
        $query = 'SELECT id ,title, content, author, DATE_FORMAT(dateAdd, "%d/%m/%Y") AS dateAdd, DATE_FORMAT(dateEdit, "%d/%m/%Y") AS dateEdit FROM news ORDER BY id DESC '.$limit;
        $req = $db->query($query);  
        $donnees = $req->fetchAll(PDO::FETCH_CLASS, News::class);
        $req->closeCursor();
        return $donnees;
    }

    public static function addNewsToBdd($db, $formInfo){
        $newNews = $db->prepare('INSERT INTO news(id, author, title, content) VALUES(NULL, ?, ?, ?)');
        $newNews->execute(array($formInfo['author'], $formInfo['title'],$formInfo['content']));
    }

    public static function getNews($db, $idNews) {
        $idNews = htmlspecialchars($idNews);
        if (preg_match("#[^0-9]+#", $idNews) || $idNews == "") {
            return false;
        }
        $dataNews = self::getNewsData($db, $idNews);
    
        if (empty($dataNews)) {
            return false;
        }
        return $dataNews;
    }

    public static function getNewsData($db, $idNews) {
        $reponseNews = $db->prepare('SELECT *, DATE_FORMAT(dateAdd, \'%d/%m/%Y à %Hh%imin%ss\') AS dateAdd FROM news WHERE id = ?');
        $reponseNews->execute(array($idNews));
        $dataNews = $reponseNews->fetchAll(PDO::FETCH_CLASS, News::class);
        $dataNews = $dataNews[0]; 
        $reponseNews->closeCursor();
        return $dataNews;
        
    }

    public static function updateNews($db, $newsInfo) {
            $reponse = $db->prepare('UPDATE news SET author =:author, title =:title, content =:content, dateEdit = NOW()  WHERE id =:id');
            $reponse->execute($newsInfo);  
        }
    
    public static function deleteNews($db, $id) {
        $id = (int) $id;
        $reponse = $db->prepare('DELETE FROM news WHERE id = ?');
        $reponse->execute(array($id));
        $reponse->closeCursor();
    }
}
?>
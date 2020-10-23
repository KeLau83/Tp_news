<?php

class PostManager {

    public static function getLastFivePosts($db) {
        $req = $db->query('SELECT id ,title, content, DATE_FORMAT(dateAdd, "%d/%m/%Y") AS date FROM news ORDER BY id DESC LIMIT 5');
        $donnees = $req->fetchAll();
        return $donnees;
    }

    public function getPost($db, $idPost) {
        $reponsePost = $db->prepare('SELECT *, DATE_FORMAT(dateAdd, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM news WHERE id = ?');
        $reponsePost->execute(array($idPost));
        $dataPost = $reponsePost->fetch();
        $reponsePost->closeCursor();
        return $dataPost;
        
    }

    public function checkIfArticleExistIn($db,$idPost) {
        $idPost = htmlspecialchars($idPost);
        if (preg_match("#[^0-9]+#", $idPost)) {
            return false;
        }   
        $data = $this->getPost($db,$idPost);
    
        if (empty($data)) {
            return false;
        }
        return $data;
    }
    
}
?>
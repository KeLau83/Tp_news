
<?php
require('./controller/BaseController.php');
require('./modele/PostManager.php');
class FrontController extends BaseController{
    
    public function home() {
        $title = 'Accueil';
        $db = $this -> connectToDB();
        $articles = PostManager::getLastFivePosts($db);
        $viewData = [
            'title' => $title,
            'articles' => $articles,
        ];
        $this -> render('homeView.php', $viewData);
    }
}
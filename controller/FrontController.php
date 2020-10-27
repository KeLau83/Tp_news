<?php
namespace App\controller;

use \DateTime;
use App\Modele\DbFactory;
use App\Modele\FormService;
use App\Modele\NewsManager;
use App\Traits\MethodePost;

class FrontController extends BaseController{
    use MethodePost {itsNotARequestPost as private;}
    
    public function home() {
        $titlepage = 'Accueil';
        $db = DbFactory::connectToDB();
        $newsList = NewsManager::getListNews($db, 5);
        $viewData = [
            'titlePage' => $titlepage,
            'newsList' => $newsList,
        ];
        $this -> render('homeView.php', $viewData);
    }

    public function news() {
        $db = DbFactory::connectToDB();
        $id = $this ->issetWithGet('id');
        $news = NewsManager::getNews($db, $id);
        $titlePage = $news -> getTitle();
        $viewData = [
            'titlePage' => $titlePage,
            'news' => $news,
            'newsContent' => nl2br($news -> getContent())
        ];
        $this -> render('newsView.php',$viewData);
    }

    public function admin() {
        $id = $this -> issetWithGet('id');
        $db = DbFactory::connectToDB();
        $newsEdit = NewsManager::getNews($db, $id);
        $newsList = NewsManager::getListNews($db);
        $titlepage = 'Admin';
        $formInfo = [
            'titlePage' => $titlepage,
            'title' => $this -> issetWithPost('title'),
            'author' => $this -> issetWithPost('author'),
            'content' => $this -> issetWithPost('content'),
            'newsEdit' => $newsEdit,
            'newsList' => $newsList,
            'errorMessage' => ''
        ];
        $errorMessage = "";
        $isValid = FormService::checkFormCreate($formInfo, $errorMessage);
        
        if(!$isValid){
            $formInfo['errorMessage'] =  $errorMessage;
            $this -> render('adminView.php', $formInfo);
            return;
        }
        
        if(!($newsEdit)){
            $formInfo['content'] = nl2br($formInfo['content']);
            $db = DbFactory::connectToDB();
            NewsManager::addNewsToBdd($db, $formInfo);
        }
        
        elseif($newsEdit) {
            $date = new DateTime; 
            $date = $date->format('d/m/Y');
            $newsInfo = [
                'title' => $this -> issetWithPost('title'),
                'author' => $this -> issetWithPost('author'),
                'content' => $this -> issetWithPost('content'),
                'id' => (int) $id,
            ];
            NewsManager::updateNews($db, $newsInfo);
        }
        header("Location: index.php");
    }

    public function delete() {
        $id = $this -> issetWithGet('id');
        $db = DbFactory::connectToDB();

        if(!($this -> itsNotARequestPost())){
            NewsManager::deleteNews($db, $id);
            header("Location: index.php?action=admin");
        }

        $news = NewsManager::getNews($db, $id);
        $newsInfo = [
            'titlePage' => 'Delete',
            'news' => $news,
            'id' => $id
        ];
        $this -> render('deleteView.php', $newsInfo);
    }
}
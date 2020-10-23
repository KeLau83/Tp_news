<?php
class BaseController {
    protected function render($viewName, $viewData, $viewTemplate = 'template.php') {
        ob_start();
        require('./View/' .$viewName);
        $content = ob_get_clean();
        require('./template/' .$viewTemplate);
    }

    protected function connectToDB() {
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=tp_news;charset=utf8', 'root', '');
            return $bdd;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }    
    }
}
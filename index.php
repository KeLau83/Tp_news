<?php
require('./controller/Frontcontroller.php');
$frontController = new FrontController();
$action = isset($_GET['action']);

if ($action) {
    $action = $_GET['action'];
    switch($action) {
       case 'home' :
        $frontController -> home();
            break;
        
        default:
        $frontController -> home();
    }

}else {
    $frontController -> home();
}
    

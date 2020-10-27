<?php
require('./autoload.php');

use App\controller\FrontController;
use App\Modele\DbFactory;
use App\Modele\NewsManager;

$frontController = new FrontController();
$action = isset($_GET['action']);
$db = DbFactory::connectToDB();

if ($action) {
    $action = $_GET['action'];
    switch ($action) {

        case 'home':
            $frontController->home();
            break;

        case 'news':
            if (isset($_GET['id']) && NewsManager::getNews($db, $_GET['id'])) {
                $frontController->news();
            } else {
                $frontController->home();
            }
            break;

        case 'delete':
            if (isset($_GET['id']) && NewsManager::getNews($db, $_GET['id'])) {
                $frontController->delete();
            } else {
                $frontController->home();
            }
            break;

        case 'admin':
            $frontController->admin();
            break;

        default:
            $frontController->home();
    }
} else {
    $frontController->home();
}

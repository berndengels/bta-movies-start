<?php
// starte session
session_start();
// include Helper class
require_once 'inc/Helper.php';

// non static call
// $helper = new Helper();
// $helper->dump($_GET);

// static call
// Helper::dump($_GET);

// initialisiere variablen
$id         = null;
// name einer controller funktion
$action     = null;
// konstruktor eines controllers
$controller = null;

// todo define controller
if( isset($_GET['controller']) ) {
    switch($_GET['controller']) {
        case 'authors':
            require_once 'Controller/AuthorController.php';
            $controller = new AuthorController();
            break;
        case 'movies':
            require_once 'Controller/MovieController.php';
            $controller = new MovieController();
            break;
        case 'user':
            require_once 'Controller/UserController.php';
            $controller = new UserController();
            break;
        case 'api':
            require_once 'Controller/ApiController.php';
            $controller = new ApiController();
            break;
        case 'categories':
            require_once 'Controller/CategoryController.php';
            $controller = new CategoryController();
            break;
        case 'events':
            require_once 'Controller/EventController.php';
            $controller = new EventController();
            break;
    //    default:
    //        echo "$_GET[controller] is invalid";
    }

    if (isset($_GET['action']) && $controller && method_exists($controller, $_GET['action'])) {
        $action = $_GET['action'];
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $controller->$action($id);
        } else {
            $controller->$action();
        }
    }

} else {
    require_once 'Views/home.php';
}
?>

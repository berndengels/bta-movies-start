<?php
// starte session
session_start();
require_once 'inc/Helper.php';
require_once 'Controller/AuthorController.php';
require_once 'Controller/UserController.php';

// Helper::dump($_GET);
// $_GET - assoc. array für get-params
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
            $controller = new AuthorController();
            break;
        case 'user':
            $controller = new UserController();
            break;
    }
    if( isset($_GET['action']) && $controller && method_exists($controller, $_GET['action']) ) { // null !== $controller gibt das gleiche Resultat wie ohne Vorzeichen 
        $action = $_GET['action'];
        if( isset($_GET['id']) ) {
            $id = $_GET['id'];
            $controller->$action($id);
        }
        else {
            $controller->$action();
        }
    }
}
else {
    require_once 'Views/home.php'; // fallback
}
?>
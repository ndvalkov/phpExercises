<?php

error_reporting(E_ALL ^ E_NOTICE);
session_start();
include '../system/Config.php';
include '../system/View.php';

if (isset($_GET['p'])) {
    $current_page = $_GET['p'];
} else {
    $current_page = 'index';
}



switch ($current_page) {
    case 'register':
        include '../controllers/RegisterController.php';
        $page = new RegisterController();
        break;
    case 'index':
        include '../controllers/IndexController.php';
        $page = new IndexController();
        $page->index();
        break;
    case 'login':
        include '../controllers/IndexController.php';
        $page = new IndexController();
        $page->login();
        break;
    case 'logout':
        include '../controllers/IndexController.php';
        $page = new IndexController();
        $page->logout();
        break;
	case 'newauc':
        include '../controllers/NewaucController.php';
        $page = new NewaucController();
        break;
    default:
        View::getInstance()->render('404', array('page_title' => 'Грешка!'));
        break;
}

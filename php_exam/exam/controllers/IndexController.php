<?php

class IndexController {

    public function index() {
        include '../models/AuctionsModel.php';
		$au_model = new AuctionsModel();
		$res = $au_model->getAuctions();
		View::getInstance()->render('index', array('page_title' => 'Търговска къща - Sorry International', 'data' => $res));
    }

    public function login() {
        $view_data['page_title'] = 'Вход';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            include '../models/UserModel.php';
            $user_model = new UserModel();
            $result = $user_model->getUser($_POST['email'], $_POST['pass']);            
            if ($result['success'] && $result['data']) {
                $_SESSION['is_logged']=true;
                $_SESSION['user_data']=$result['data'];
                header('Location: ?');
                exit;
            } else {
                $view_data['errors'] = $result['error'];
            }
        }
        View::getInstance()->render('login', $view_data);
    }
    
    public function logout(){
        session_destroy();
        header('Location: ?');
    }

}

<?php

class NewaucController {

    public function __construct() {
        $view_data['page_title'] = 'Нов търг';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            include '../models/newaucModel.php';
            $na_model = new NewaucModel();
            $result = $na_model->addAuction($_POST['nameProduct'], $_POST['descProduct'], $_POST['startPrice'], $_POST['endDate']);
            if ($result['success']) {
                View::getInstance()->render('newauc_ok', $view_data);
                exit;
            } else {
                $view_data['errors'] = $result['errors'];
            }
        }
        View::getInstance()->render('newauc', $view_data);
    }

}

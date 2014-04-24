<?php

include '../controllers/IndexController.php';

class BidController extends IndexController {

    public function index() {
        include '../models/AuctionsModel.php';
		$au_model = new AuctionsModel();
		$res = $au_model->getAuctions();
		View::getInstance()->render('bid', array('page_title' => 'Търг', 'data' => $res));
    }

   

}

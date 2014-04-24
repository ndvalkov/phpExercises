<?php
include '../system/BaseModel.php';

class NewaucModel extends BaseModel {

    public function addAuction($name, $description, $startPrice, $endDate) {
        $name = trim($name);
        $description = trim($description);
        $startPrice = (int)trim($startPrice);
        $endDate = trim($endDate);
		
        $errors = array();
        
		if (mb_strlen($name) < 5) {
            $errors['password_length'] = true;
        }
		
		if (mb_strlen($description) < 11) {
            $errors['desc_length'] = true;
        }
		
		if (!($startPrice > 0)) {
            $errors['price'] = true;
        }
		
		$test_arr  = explode('/', $endDate);
		
		if (count($test_arr) == 3) {
			if (!(checkdate($test_arr[0], $test_arr[1], $test_arr[2]))) {
				$errors['date'] = true;
			}
		} else {
			$errors['date'] = true;
		}
		
		$currentTime = time();
		
		if ( $currentTime > strtotime($endDate)) {
			$errors['date'] = true;
		}
		
		$endDate = strtotime($endDate);

        if (count($errors) > 0) {
            return array('success' => false, 'errors' => $errors);
        }
		
		
		
		
        $this->db_connection->query('INSERT INTO auctions (user_id, date_created, minimum_price,
			date_end, action_title, auction_desc) VALUES("'
			.$_SESSION["user_data"]["user_id"].'", '.time().', '.$startPrice.','
			.$endDate.', "'.mysqli_real_escape_string($this->db_connection, $name).'", "'
			.mysqli_real_escape_string($this->db_connection, $description).'")');
		
		
		
		$this->db_connection->query('INSERT INTO auction_prices (user_id, date_added, price, auction_id
			) VALUES("'
			.$_SESSION["user_data"]["user_id"].'", '.time().', '.$startPrice.','.$this->db_connection->insert_id.')');
			

        return array('success' => true, 'user_id' => $this->db_connection->insert_id);
    }

   

}

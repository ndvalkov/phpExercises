<?php
include '../system/BaseModel.php';

class AuctionsModel extends BaseModel {

    public function getAuctions($auction = null) {
        
		if (isset($auction)) {
			$this->auction = 'AND auctions.auction_id = '.$auction;
		} else {
			$this->auction = '';
		}
		
		
        $query = $this->db_connection->query('SELECT * FROM auctions
			LEFT JOIN auction_prices 
			ON auctions.auction_id = auction_prices.auction_id
			LEFT JOIN users ON auction_prices.user_id = users.user_id
			WHERE auction_prices.price != "null"'.$this->auction);
        
		$result = array();

		while($row = mysqli_fetch_assoc($query)){
			
			$result[$row['auction_id']]['action_title'] = $row['action_title'];
			$result[$row['auction_id']]['auction_desc'] = $row['auction_desc'];
			$result[$row['auction_id']]['date_end'] = $row['date_end'];
			$result[$row['auction_id']]['email'] = $row['email'];
			$result[$row['auction_id']]['price_id'][] = $row['price'];
			
		}

		foreach($result as &$v){
			
			$v['price_id'] = max($v['price_id']);
			
		}
		
		
		if ($query->num_rows < 1) {
            return array('success' => false, 'error' => 'no_record');
        }
        return array('success' => true, 'data' => $result);
    }

}

<?php
session_start();
$page_title = 'Търг';
include '../views/header.php';

if (!(isset($_SESSION["user_data"]))) {
	header("location:login.php");
	exit;
}

// ---should not mix model and view!!!, terrible, just terrible..., I hate when that happens...very suspicious---

$connection = mysqli_connect('localhost', 'Niki', 'niki', 'auction');
	
	if (!$connection) {
		echo 'no connection';
		exit;
	}
	mysqli_query($connection, 'SET NAMES utf8');
	
	$page = trim($_GET['p']);
	
	
	$q = mysqli_query($connection, 'SELECT * FROM auctions WHERE action_title
		= "'.mysqli_real_escape_string($connection, $page).'"');
	
	$row = $q->fetch_assoc();
	$id = $row['auction_id'];
	
	
	
	$q = mysqli_query($connection, 'SELECT * FROM auctions
			LEFT JOIN auction_prices 
			ON auctions.auction_id = auction_prices.auction_id
			LEFT JOIN users ON auction_prices.user_id = users.user_id
			WHERE auction_prices.price != "null" AND auctions.auction_id = '.$id);

	
	
	
	echo '<a href="../public/index.php">Начало</a>';
	echo '<table style="border-collapse:collapse;border:1px solid black"><tr><td>Име на търга</td><td>Описание</td><td>Крайна дата</td><td>Потребител</td><td>Най-висока цена</td></tr>';
	
	$currentPrice = 1;
	
	while ($row = $q->fetch_assoc()) {
		
		if ($row["price"] < $currentPrice) {
			continue;
		} else {
			$currentPrice = $row["price"];
		}
		
		$str = '<tr><td>'.$row["action_title"].'</a></td><td>'.$row["auction_desc"].
		'</td><td>'.gmdate("Y-m-d", $row["date_end"]).'</td><td>'.$row["email"].'</td><td>'.$row["price"].' лв.</td></tr>';
		
	}
	
	echo $str;
	


echo '</table>';
	
?>

<form method="POST">
	
	<label for="price">Нова оферта</label>
	<input type="text" name="price" />
	<input type="submit" value="Изпрати" />
	
</form>




<?php
include '../views/footer.php';

if ($_POST) {
	
	$price = trim($_POST['price']);
	
	if ($price > $row["price_id"] && ($price != $currentPrice)) {
		
		$q = mysqli_query($connection, 'INSERT INTO auction_prices(auction_id, user_id, price, date_added)
			VALUES ('.$id.', '.$_SESSION["user_data"]["user_id"].', '.
			mysqli_real_escape_string($connection, $price).', '.time().' )');
		
		header('location:bid.php?p='.$_GET['p']);
		
	} else {
		echo 'Цената трябва да е по-висока от текущата за търга';
	}
	
	
}



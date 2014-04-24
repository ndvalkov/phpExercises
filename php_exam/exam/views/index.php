<?php

include '../views/header.php';
if ($_SESSION['is_logged']) {
    echo '<div>Здравей ' . $_SESSION['user_data']['email'] . ' <a href="?p=newauc">Нова обява</a> <a href="?p=logout">Изход</a></div>';
} else {
    echo '<div><a href="?p=login">Вход</a> <a href="?p=register">Регистрация</a> </div>';
}
?>


<?php

$result = $data['data'];

echo '<table style="border-collapse:collapse;border:1px solid black"><tr><td>Име на търга</td><td>Описание</td><td>Крайна дата</td><td>Потребител</td><td>Най-висока цена</td></tr>';

foreach($result as $v){
	
	if ($v["date_end"] < time()) {
		continue;
	}
	
	echo '<tr><td><a href="../views/bid.php?p='.$v["action_title"].'">'.$v["action_title"].'</a></td><td>'.$v["auction_desc"].
		'</td><td>'.gmdate("Y-m-d", $v["date_end"]).'</td><td>'.$v["email"].'</td><td>'.$v["price_id"].' лв.</td></tr>';
}

echo '</table>';





include '../views/footer.php';



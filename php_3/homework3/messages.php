<?php
	session_start();
	$title = 'messages';
	include './includes/header.php';
	
	if ($_SESSION['isLogged'] != true) {
		header('location: index.php');
		exit;
	}
	
	
	$connection = mysqli_connect('localhost', 'Niki', 'niki', 'tastdb');
	if (!$connection) {
		echo 'no connection';
		exit;
	}
	
	mysqli_query($connection, 'SET NAMES utf8');
	
	$q = mysqli_query($connection, 'SELECT date, user_name, message, title FROM messages');
	
	if (!$q) {
		echo 'error';
	}
	
	
	
	
	if ($_POST) {
		
		$err = false;
		$msg = trim($_POST['msg']);
		$msg = stripslashes($msg);
		$msg = htmlspecialchars($msg);
		
		if (strlen($msg) < 1) {
			$err = true;
			echo 'Няма въведен текст';
		}
		
		if (strlen($msg) > 250) {
			$err = true;
			echo 'Текстът е твърде дълъг(макс = 250 символа)';
		}
		
		$title = trim($_POST['title']);
		$title = stripslashes($title);
		$title = htmlspecialchars($title);
		
		if (strlen($title) > 50) {
			$err = true;
			echo 'Заглавието е твърде дълго(макс = 50 символа)';
		}
		
		if (!$err) {
			$q2 = mysqli_query($connection, 'INSERT INTO messages (date, user_name, message, title) 
				VALUES ("'.date("Y-m-d H:i:s").'", "'.$_SESSION["user"].
					'", "'.$msg.'", "'.$title.'")');
				
			if ($q2) {
				echo 'Съобщението е публикувано';
				$_POST = array();
				header('location: messages.php');
				exit;
			} else {
				echo "Грешка при публикацията";
			}
			
		}
		
		
	}
	
	
	
?>

<span style="font-weight: bold; color: #f00;">Съобщения</span>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<input type="text" name="title" placeholder="Заглавие" style="float:left"/>
	
	<textarea name="msg" id="msg" cols="30" rows="10" placeholder="текст" style="margin-top: 5px;">
	
	</textarea>
	<input type="submit" value="Публикувай"/>
</form>
<a href="logout.php">Изход</a>
<br/>

<div id="allMessages">
	
	<?php
		if ($q->num_rows>0) { 
			echo '<section style="position:absolute; top:30px;left:400px;">';
			$arrRows =  $q->fetch_all();
			$len = count($arrRows);
			for ($i = $len - 1; $i >= 0; $i--) {
				
				echo '<article style="border: 3px dotted #00f; padding: 5px; border-radius: 3px">';
				echo '<span>'.$arrRows[$i][1].'</span>';
				echo '<span style="margin-left:5px">'.$arrRows[$i][0].'</span>';
				echo '<h4>'.$arrRows[$i][3].'</h4>';
				echo '<p>'.$arrRows[$i][2].'</p>';
				echo '</article>';
				
			}
			echo '</section>';
		}
	?>
	
	
</div>



<?php
	include './includes/footer.php';



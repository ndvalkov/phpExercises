<?php
	session_start();
	$title = 'homework2';
	include 'includes/header.php';
	
	if (isset($_SESSION['isLogged']) && $_SESSION['isLogged'] == true) {
		echo '<a href="logout.php">Изход</a>';
		echo '<a href="files.php">Списък с файлове</a>';
		echo '<a href="upload.php">Качи нов файл</a>';
	} else {
		if ($_POST) {
			$name = trim($_POST['username']);
			$pass = trim($_POST['password']);
			
			if ($name == "Niki" && $pass == "niki") {
				$_SESSION['isLogged'] = true;
				header('location: index.php');
				exit;
			} else {
				echo "invalid input data";
			};
		
		};
		
		include 'form.php';
	}
	
?>		
			

<?php
	
	include 'includes/footer.php';		
	
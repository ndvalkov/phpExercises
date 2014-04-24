<?php
	session_start();
	$title = 'home';
	include './includes/header.php';
	
	if (isset($_SESSION['isLogged']) && $_SESSION['isLogged'] == true) {
		echo '<a href="logout.php">Изход</a>';
		
	} else {
		if ($_POST) {
			$name = trim($_POST['username']);
			$name = stripslashes($name);
			$name = htmlspecialchars($name);
			$pass = trim($_POST['password']);
			$pass = stripslashes($pass);
			$pass = htmlspecialchars($pass);
			
			$connection = mysqli_connect('localhost', 'Niki', 'niki', 'tastdb');
			if (!$connection) {
				echo 'no connection';
				exit;
			}
			
			mysqli_query($connection, 'SET NAMES utf8');
			$name = mysqli_real_escape_string($connection, $name);
			$pass = mysqli_real_escape_string($connection, $pass);
			
			$q = mysqli_query($connection, 'SELECT user_name, password FROM users');
			
			// echo '<pre>'.print_r($q, true).'</pre>';
			
			
			if (!$q) {
				echo 'error with database query';
			};
			
			if ($q->num_rows>0) { 
				
				while ($row = $q->fetch_assoc()) {
					
					if ($row['user_name'] == $name && $row['password'] == $pass) {
						$_SESSION['isLogged'] = true;
						$_SESSION['user'] = $name;
						header('location: messages.php');
						exit;
					}
					
				}
				
				if (!isset($_SESSION['user'])) {
					echo 'Грешно име и/или парола';
				}
				
			}
		
		};
		
		echo '<div id="login-form"><span style="font-weight: bold; color: #f00;">Вход</span>';
		include 'includes/form.php';
		echo '</div><a href="register.php">Регистрация</a>';
	}
	
	
	
?>

<?php
	include './includes/footer.php';
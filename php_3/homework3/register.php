<?php
	session_start();
	$connection = mysqli_connect('localhost', 'Niki', 'niki', 'tastdb');
	if (!$connection) {
		echo 'no connection';
		exit;
	}
	
	mysqli_query($connection, 'SET NAMES utf8');
	
	$title = 'reg-form';
	include 'includes/header.php';
	
	if ($_POST) {
		$name = trim($_POST['username']);
		$name = stripslashes($name);
		$name = htmlspecialchars($name);
		$pass = trim($_POST['password']);
		$pass = stripslashes($pass);
		$pass = htmlspecialchars($pass);
		$pass2 = trim($_POST['password-repeat']);
		$pass2 = stripslashes($pass2);
		$pass2 = htmlspecialchars($pass2);
		$name = mysqli_real_escape_string($connection, $name);
		$pass = mysqli_real_escape_string($connection, $pass);
		
		$err = false;
		
		if (strlen($name) < 5) {
			echo 'Името трябва да съдържа минимум 5 символа';
			$err = true;
		};
		
		if ($pass != $pass2) {
			echo 'Въведената повторно парола не съвпада';
			$err = true;
		}
		
		if (!$err) {
			
			$q = mysqli_query($connection, 'SELECT user_name FROM users');
			$hasAccount = false;
			
			if (!$q) {
				echo "error with database query";
			}
			
			if ($q->num_rows>0) { 
				
				while ($row = $q->fetch_assoc()) {
					
					if ($row['user_name'] == $name) {
						$hasAccount = true;
					}
					
				}
			}
			
			if ($hasAccount) {
				echo "Вече съществува акаунт с това име";
			} else {
			
				$q = mysqli_query($connection, 'INSERT INTO users (user_name, password) 
					VALUES ("'.$name.'", "'.$pass.'");');
				
				if ($q) {
					$_SESSION['isLogged'] = true;
					$_SESSION['user'] = $name;
					header('location: messages.php');
					exit;
				} else {
					echo "Неуспешна връзка с базата данни";
				}
				
				
			}
			
		}
		
	};
		
?>


<span style="font-weight: bold; color: #f00;">Регистрация</span>

<?php
	include 'includes/form.php';
?>

<a href="index.php">Начало</a>


<?php
	include 'includes/footer.php';
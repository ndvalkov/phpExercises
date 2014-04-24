<?php
	
	session_start();
	
	$title = 'login';
	include './includes/header.php';
	
	$connection = mysqli_connect('localhost', 'Niki', 'niki', 'books');
	
	if (!$connection) {
		echo 'no connection';
		exit;
	}
	mysqli_query($connection, 'SET NAMES utf8');
	
	if (isset($_SESSION["isLogged"])) {
		header('location:index.php');
		exit;
	} else {
	
		if ($_POST) {
			
			$user = trim($_POST['username']);
			$pass = trim($_POST['password']);
			
			$errs = [];
			
			$q = mysqli_query($connection, 'SELECT * FROM users');
			
			if (!$q) {
				echo '<pre>'.print_r(mysqli_error($connection), true).'</pre>';
				echo 'problem with database query';
				exit;
			}
			
			
			// echo '<pre>'.print_r($q, true).'</pre>';
			
			
			while($row = $q->fetch_assoc()) {
				if ($row['user_name'] == $user && $row['password'] == md5($pass)) {
					$_SESSION['isLogged'] = 1;
					$_SESSION['user'] = $user;
					header('location:index.php');
					exit;
				}
			}
			
			echo 'Името и/или паролата са невалидни';

		}
		
		
	}
	
	
	
?>


<form action="login.php" method="POST">
	<label for="username">Потребителско име</label>
	<input type="text" name="username" id="username" />
	<label for="password">Парола</label>
	<input type="password" name="password" id="password" />
	<input type="submit" value="Вход" />
	
</form>
<br/>
<a href="register.php">Регистрация</a><a href="index.php">Книги</a><br/>
<span style="color:#0f0; font-style:italic">*Регистрираните потребители имат право да четат и пишат коментари</span>
<?php
	include './includes/footer.php';

	
	
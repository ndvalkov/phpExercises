<?php
	
	session_start();
	
	$title = 'register';
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
			$pass2 = trim($_POST['password2']);
			
			$errs = [];
			
			if ($pass != $pass2) {
				$errs[] = 'passMatch';
			}
			
			if (mb_strlen($user, 'utf8') < 4 || mb_strlen($pass, 'utf8') < 4) {
				$errs[] = "shortInput";
			}
			
			$q = mysqli_query($connection, 'SELECT user_name FROM users');
			
			if (!$q) {
				echo '<pre>'.print_r(mysqli_error($connection), true).'</pre>';
				echo 'problem with database query';
				exit;
			}
			
			
			// echo '<pre>'.print_r($q, true).'</pre>';
			
			
			while($row = $q->fetch_assoc()) {
				if ($row['user_name'] == $user) {
					$errs[] = 'userExists';
				}
			}
			
			if (count($errs) == 0) {
				
				$q = mysqli_query($connection, 'INSERT INTO users(user_name, password)
					VALUES ("'.mysqli_real_escape_string($connection, $user).'",
						"'.mysqli_real_escape_string($connection, md5($pass)).'")');
				
				
				if (!$q) {
					echo '<pre>'.print_r(mysqli_error($connection), true).'</pre>';
					echo 'problem with database query';
					exit;
				}
				
				echo 'Вие се регистрирахте успешно!';
				echo '<a href="index.php">Книги</a>';
				$_SESSION['isLogged'] = 1;
				$_SESSION['user'] = $user;
				
			}
			
			
			
			
			
		}
		
		
	}
	
	
	
?>


<form action="register.php" method="POST">
	<label for="username">Потребителско име</label>
	<input type="text" name="username" id="username" />
	<label for="password">Парола</label>
	<input type="password" name="password" id="password" />
	<label for="password2">Повторете парола</label>
	<input type="password" name="password2" id="password2" />
	<input type="submit" value="Регистрация" />
	
</form><br/>
<a href="login.php">Вход</a><a href="index.php">Книги</a><br/>
<span style="color:#0f0; font-style:italic">*Регистрираните потребители имат право да четат и пишат коментари</span><br/>
<?php
	include './includes/footer.php';
	
	if (isset($errs) && count($errs) != 0) {
		for ($i = 0; $i < count($errs); $i++) {
			switch ($errs[$i]) {
				case 'passMatch': echo 'Паролите не съвпадат<br/>'; break;
				case 'userExists': echo 'Този потребител вече съществува<br/>'; break;
				case 'shortInput': echo 'Името и/или паролата трябва да съдържат минимум 3 символа<br/>'; break;
			}
		}
		
		$errs = array();
		
	}
	
	
	
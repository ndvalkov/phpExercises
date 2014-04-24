<?php
	session_start();
	
	$title = 'authors';
	include './includes/header.php';
	
	$connection = mysqli_connect('localhost', 'Niki', 'niki', 'books');
	
	if (!$connection) {
		echo 'no connection';
		exit;
	}
	mysqli_query($connection, 'SET NAMES utf8');
	
	$q = mysqli_query($connection, 'SELECT * FROM authors');
	
	if (!$q) {
		echo 'error with query';
		exit;
	}
	
?>

<a href="index.php">Книги</a><br/>

<form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="margin-top: 10px;">
	<label for="author">Автор:</label>
	<input type="text" name="author" />
	<input type="submit" value="Добави" />
</form>

<?php
	include './includes/footer.php';
	
	$arrAuthors = array();
	
	echo '<table style="margin-top:5px;"><tr><td>Автор</td></tr>';
	while ($row = $q->fetch_assoc()) {
		$arrAuthors[] = $row["author_name"];
		echo '<tr><td><a href="authorbooks.php?author='.$row["author_name"].'">'.$row["author_name"].'</a></td></tr>';
		
	}
	echo '</table>';
	
	if ($_GET) {
		
		$aut = trim($_GET['author']);
		
		if (mb_strlen($aut, 'utf8') < 3) {
			echo "Името е твърде кратко, опитай отново, моля те...знам, че можеш.";
			exit;
		} else {
			// var_dump(array_search($aut, $arrAuthors));
			if (array_search($aut, $arrAuthors) == true || array_search($aut, $arrAuthors) === 0) {
				echo 'Този автор вече съществува';
			} else {
				mysqli_query($connection, 'INSERT INTO authors(author_name) VALUES ("'.mysqli_real_escape_string($connection, $aut).'")');
				header('location: newauthor.php');
				exit;
			}
		}
	}

	
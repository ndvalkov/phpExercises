<?php
	session_start();
	
	$title = 'new book';
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


<a href="index.php">Книги</a><a href="newauthor.php">Нов автор</a>
<form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="margin-top: 10px;">
	<label for="book">Име на книгата:</label>
	<input type="text" name="book" id="book"/>
	<select name="access_list[]" id="sel" multiple="multiple">
	<?php
		while ($row = $q->fetch_assoc()) {
		
			echo"<option value=".$row['author_id'].">".$row['author_name']."</option>";
		
		}
	
	?>
	</select>
	<input type="submit" value="Добави"/>
</form>
	

<?php
	include './includes/footer.php';
	
	if ($_GET) {
		
		
		
		
		$book = trim($_GET['book']);
		
		
		if (!isset($_GET['access_list'])) {
			echo "Трябва да въведете автор";
			
		} else {
		
			$auts = $_GET['access_list'];
		
			for ($i = 0; $i < count($auts); $i++) {
				$auts2[] = (int)$auts[$i];
			}
			
			if (mb_strlen($book, 'utf8') < 3) {
				echo 'Заглавието на книгата е твърде кратко';
			} else {
				
				$q2 = mysqli_query($connection, 'INSERT into books(book_title) VALUES ("'.mysqli_real_escape_string($connection, $book).'")');
				$q3 = mysqli_query($connection, 'SELECT * FROM books WHERE book_title = "'.mysqli_real_escape_string($connection, $book).'"');
				
				$dt = $q3->fetch_assoc();
				
				echo '<pre>'.print_r($dt, true).'</pre>';
				
				
				for ($i = 0; $i < count($auts2); $i++) {
					mysqli_query($connection, 'INSERT INTO books_authors(book_id, author_id) 
					VALUES ("'.mysqli_real_escape_string($connection, $dt["book_id"]).'", "'.mysqli_real_escape_string($connection, $auts2[$i]).'")');
				}
				
				$_GET = array();
				header('location: newbook.php');
				exit;
			}
		}
		
		
		
		
		
		
		// echo '<pre>'.print_r($auts2, true).'</pre>';
		
		
	}
	
	

	
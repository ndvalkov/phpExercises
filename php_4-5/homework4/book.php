<?php
	session_start();
	
	if (!isset($_SESSION['isLogged'])) {
		header('location:login.php');
		exit;
	}
	
	
	$title = 'books';
	include './includes/header.php';
	
	$connection = mysqli_connect('localhost', 'Niki', 'niki', 'books');
	
	if (!$connection) {
		echo 'no connection';
		exit;
	}
	mysqli_query($connection, 'SET NAMES utf8');
	
	if (isset($_GET['book']) || isset($_SESSION['currentBook'])) {
		
		if (!(isset($_GET['book']))) {
			$book = $_SESSION['currentBook'];
		} else {
			$book = $_GET['book'];
			$_SESSION['currentBook'] = $book;
		}
		
		$q = mysqli_query($connection, 'SELECT * FROM books LEFT JOIN books_authors
		ON books.book_id = books_authors.book_id
		LEFT JOIN authors ON books_authors.author_id = authors.author_id');
		
		
		if (!$q) {
			echo '<pre>'.print_r(mysqli_error($connection), true).'</pre>';
			echo 'problem with database query';
			exit;
		}
		
		$result = array();
	
		while($row = mysqli_fetch_assoc($q)){
			
			if ($row['book_title'] != $book) {
				continue;
			}
			
			$result[$row['book_id']]['book_title'] = $row['book_title'];
			$result[$row['book_id']]['author_id'][] = $row['author_name'];
		}
		
		echo '<table><tr><td>Book</td><td>Author</td></tr>';
		
		foreach($result as $v) {
			
			$data = array();
			echo '<tr><td><a href="book.php?book='.$v["book_title"].'">'.$v["book_title"].'</a></td><td>';
			foreach($v['author_id'] as $v2) {
				echo '<a href="authorbooks.php?author='.$v2.'">'.$v2.'</a><br/>';
			}
			
			echo '</td></tr>';
		}
		
		
		echo '</table><br/>';
		
		if ($_POST) {
			
			$comment = trim($_POST['comment']);
			
			if (!isset($_SESSION['currentComment']) || $_SESSION['currentComment'] != $comment) {
				
				$q = mysqli_query($connection, 'INSERT INTO comments(user_name, comment, datetime, book_title)
				VALUES ("'.$_SESSION["user"].'", "'.mysqli_real_escape_string($connection, $comment).'"
					, "'.date("Y-m-d H:i:s").'", "'.mysqli_real_escape_string($connection, $book).'")');
			
				if (!$q) {
					echo '<pre>'.print_r(mysqli_error($connection), true).'</pre>';
					echo 'problem with database query';
					exit;
				}
				
				$_SESSION['currentComment'] = $comment;
			}
			
			
			
			
			
			
			
		}
		
	}
	
	
	

?>

<a href="newbook.php">Нова книга</a><a href="newauthor.php">Нов автор</a><a href="logout.php">Изход</a>

<form action="book.php" method="POST">
	
	<textarea name="comment" id="comment" cols="30" rows="10" placeholder="Въведете своя коментар"></textarea>
	<input type="submit" value="ОК" />
	
</form>


<?php
	include './includes/footer.php';
	
	$q = mysqli_query($connection, 'SELECT * FROM comments WHERE
		book_title = "'.mysqli_real_escape_string($connection, $book).'"');
	
	
	if (!$q) {
		echo '<pre>'.print_r(mysqli_error($connection), true).'</pre>';
		echo 'problem with database query';
		exit;
	}
	
	if ($q->num_rows > 0) {
		
		while ($row=$q->fetch_assoc()) {
			$arr[] = $row;
		}
		
		
	}
	
	echo '<table style="position:absolute;top:10px;right:10px;"><tr><td colspan="3">Comments</td></tr>';
	
	if (isset($arr)) {
		for ($i = 0; $i < count($arr); $i++) {
			
			echo '<tr><td>'.$arr[$i]["user_name"].'</td><td>'.$arr[$i]["datetime"].'</td>
				<td>'.$arr[$i]["comment"].'</td></tr>';
			
		}
	}
	
	echo '</table>';
	
	
	
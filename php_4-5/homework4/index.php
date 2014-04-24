<?php
	
	session_start();
	$title = 'home';
	include './includes/header.php';
	
	$connection = mysqli_connect('localhost', 'Niki', 'niki', 'books');
	
	if (!$connection) {
		echo 'no connection';
		exit;
	}
	mysqli_query($connection, 'SET NAMES utf8');
	
	$q = mysqli_query($connection, 'SELECT * FROM books LEFT JOIN books_authors 
		ON books.book_id = books_authors.book_id
		LEFT JOIN authors ON books_authors.author_id = authors.author_id');
	
	
	$result = array();
	
	while($row = mysqli_fetch_assoc($q)){
		$result[$row['book_id']]['book_title'] = $row['book_title'];
		$result[$row['book_id']]['author_id'][] = $row['author_name'];
	}
	
	echo '<a href="newbook.php">Нова книга</a><a href="newauthor.php">Нов автор</a>
		<a href="logout.php">Изход</a>';
	
	echo '<table><tr><td>Book</td><td>Author</td></tr>';
	
	foreach($result as $v) {
		
		$data = array();
		echo '<tr><td><a href="book.php?book='.$v["book_title"].'">'.$v["book_title"].'</a></td><td>';
		foreach($v['author_id'] as $v2) {
			echo '<a href="authorbooks.php?author='.$v2.'">'.$v2.'</a><br/>';
		}
		
		echo '</td></tr>';
	}
	
	
	echo '</table>';
	
	
	
?>





<?php
	include './includes/footer.php';

	

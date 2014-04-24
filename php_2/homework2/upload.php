<?php
	$title = 'upload';
	include 'includes/header.php';
	
	// echo '<pre>'.print_r($_FILES, true).'</pre>';
	
	if (count($_FILES) > 0) {
		if (move_uploaded_file($_FILES['file']['tmp_name'], 'files'.DIRECTORY_SEPARATOR.$_FILES['file']['name'])) {
			echo 'Успех!';
		} else {
			echo 'грешка';
		}
		
	}
	
?>

<form action="upload.php" method="POST" enctype="multipart/form-data">
	<label for="file" style="background-color: grey; color: #fff; border-radius: 5px; padding: 4px">File:</label>
	<input type="file" name="file" id="file"/>
	<input type="submit" value="Изпрати"/>
</form>
<div style="margin-top: 10px;">
	<a href="index.php">Начална страница</a>
	<a href="files.php">Списък с файлове</a>
</div>


<?php
	include 'includes/footer.php';
	

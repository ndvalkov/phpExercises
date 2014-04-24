<?php
session_start();
include '../views/header.php';

if (!(isset($_SESSION["user_data"]))) {
	header("location:index.php");
	exit;
}

?>



<form action="?p=newauc" method="POST">
	
	<label for="nameProduct">Име на продукта</label>
	<input type="text" name="nameProduct" />
	<label for="descProduct">Описание</label>
	<textarea name="descProduct" id="descProduct" cols="30" rows="10"></textarea>
	<label for="startPrice">Начална цена</label>
	<input type="text" name="startPrice" />
	<label for="endDate">Крайна дата на търга</label>
	<input type="text" id="datepicker" name="endDate">
	<input type="submit" value="Изпрати" />
	<?php
		if ($errors['password_length']) {
			echo '<div style="color:red">Името на продукта е твърде кратко</div>';
		}
		if ($errors['desc_length']) {
			echo '<div style="color:red">Описанието на продукта е твърде кратко</div>';
		}
		if ($errors['price']) {
			echo '<div style="color:red">Невалидна цена</div>';
		}
		if ($errors['date']) {
			echo '<div style="color:red">Невалидна дата</div>';
		}
	?>
</form>



<?php
include '../views/footer.php';



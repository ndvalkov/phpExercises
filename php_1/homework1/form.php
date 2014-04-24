<?php
	$title = 'Form';
	include 'includes/header.php';
	
	// echo '<pre>'.print_r($_POST, true).'</pre>';
	
	$err = false;
	
	if ($_POST) {
		
		$val = trim($_POST['name']);
		$name = str_replace('!', '', $val);
		// echo $name;
		
		$sum = (float)$_POST['sum'];
		$type = (int)$_POST['type'];
		
		
		if (mb_strlen($name, 'UTF-8') < 4) {
			echo '<p>'.'Името е туу шорт'.'</p>';
			$err = true;
		}
		
		if ($sum <= 0) {
			echo '<p>'.'Sumata e nevalidna'.'</p>';
			$err = true;
		}
		
		if (!$err) {
			$result = $name.'!'.$sum.'!'.$type.'!'.date("Y/m/d")."\r\n";
			if (file_put_contents('data.txt', $result, FILE_APPEND)) {
				echo 'zapisut e uspeeeee';
			}
			
		}
	}
	
	
	
?>
	
	<a href="index.php">Списък</a>
	
	
	
	
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="padding:5px">
		<span>Име:</span><input type="text" name="name"/><br/>
		<span>Разход:</span><input type="text" name="sum"/><br/>
		<select type="text" name="type" />
				<?php
					foreach($typesArr as $key=>$value){
						echo '<option value="'.$key.'">'.$value.'</option>';
					}
				?>
		</select>
		<input type="text" name="total" value="0" style="display:none"/>
		<input type="submit" value="Изпрати" />
	</form>

	
<?php
	include 'includes/footer.php';
?>
<?php
	
	$title = 'Costs Table';
	include 'includes/header.php';
	
	// echo '<pre>'.print_r($_POST, true).'</pre>'
	
	
	
?>


	<a href="form.php">Добави разход</a>
	
	<form method="POST" style="display:inline-block">
		<select type="text" name="optionsSort">
			<?php
				$len = count($typesArr) + 1;
				echo '<option value="'.$len.'">'.'Всички'.'</option>';
				for ($i = 1; $i < $len; $i++) {
					echo '<option value="'.$i.'">'.$typesArr[$i].'</option>';
				}
			?>
		</select>
		<input type="submit" value="Филтрирай" />
	</form>
	
	<table style="border: 1px groove #f00; border-collapse:collapse;margin-top: 5px;">
		<tr>
			<td>
				Дата
			</td>
			<td>
				Име
			</td>
			<td>
				Сума
			</td>
			<td>
				Вид
			</td>
		</tr>
		<?php
			if (file_exists('data.txt')) {
				$result = file('data.txt');
				$totalSum = 0;
				// echo '<pre>'.print_r($result, true).'</pre>';
				
				if (isset($_POST['optionsSort'])) {
					$option = $_POST['optionsSort'];
				} else{
					$option = $len;
				}
				
				foreach($result as $key=>$value){
					
					$columns = explode('!', $value);
					
					if ($columns[2] != $option && $option != $len) {
						continue;
					}
					
					$totalSum += $columns[1];
					// echo '<pre>'.print_r($columns, true).'</pre>';
					
					
					echo '<tr>';
					echo '<td>'.$columns[3].'</td>';
					echo '<td>'.$columns[0].'</td>';
					echo '<td>'.$columns[1].' лв.</td>';
					echo '<td>'.$typesArr[trim($columns[2])].'</td>';
					echo '</tr>';
				}
				
				echo '<tr><td>-----</td><td>-----</td><td style="font-weight: bold">'.$totalSum.' лв.</td><td>-----</td></tr>';
			}
			
			
			
		?>
		
		
	</table>

<?php
	include 'includes/footer.php';
?>
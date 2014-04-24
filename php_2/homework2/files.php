<?php
	$title = 'files';
	include 'includes/header.php';
	
	if (file_exists('files') && is_dir('files')) {
		$files = scandir('files');
	}
	
	
	
?>

<div id="files-list">
	<span>----------------------------------------</span>
	<ul>
		<?php
			for ($i = 2; $i < count($files); $i++) {
				echo '<li><a href="files/'.$files[$i].'" target="_blank" download>'.$files[$i].'</a></li>';
			};
		?>
		
	</ul>
</div>
<div style="margin-top: 10px;">
	<a href="index.php">Начална страница</a>
	<a href="upload.php">Качи файл</a>
</div>

<?php
	include 'includes/footer.php';
	

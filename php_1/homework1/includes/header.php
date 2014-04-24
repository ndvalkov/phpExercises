<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title><?=$title?></title>
</head>

<style type="text/css">
	
	td {
		border: 1px groove #f00;
		padding: 5px;
		width: 10%;
	}
	
	tr:nth-of-type(1) {
		font-weight: bold;
		background-color: rgb(233, 233, 233);
	}
	
	
	a {
		padding: 5px;
		
	}
	a:hover {
		color: orange;
	}
	
	form input {
		margin: 5px;
	}
	
	form select {
		margin: 5px;
	}
	
</style>

<body>

<?php
	$typesArr = array(1=>'Храна',2=>'Ток',3=>'Вода',4=>'Мацки',5=>'Оръжие',6=>'Други');
	
?>

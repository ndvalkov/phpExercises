<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title><?=$title?></title>
	
	<style type="text/css">
		
		form, form div {
			zoom: 1;
		}
		
		form:after, div:after {
			content: "";	
			clear: both;
			display:block;
		}
		
		form {
			border: 2px solid rgba(233, 233, 233, 0.5);
			width: 280px;
			padding: 3px;
			padding-bottom: 10px;
			border-radius: 5px;
			background-color: rgba(215, 215, 215, 0.5);
		}
		
			form div {
				display: block;
				margin-top: 5px;
				color: green;
				font-weight: bold;
			}
		
		form input {
			margin-top: 5px;
			float: right;
		}
	
	
	#login-form div:last-of-type {
		display:none;
	}
	</style>
</head>
<body>
	
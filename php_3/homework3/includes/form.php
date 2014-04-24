	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		
		<div><label for="username">Име:</label>
		<input type="text" name="username" id="username" /></div>
		<div><label for="password">Парола:</label>
		<input type="password" name="password" id="password"/></div>
		<div><label for="password-repeat">Повтори парола:</label>
		<input type="password" name="password-repeat" id="password-repeat"/></div>
		<input type="submit" value="Изпрати" style="padding:3px"/>
		
	</form>

<!DOCTYPE html>
<html>
	<head>
		<title>Le framework php | Login</title>
	</head>
	<body>
		<h1>Login</h1>
		<?php
			if(null != $error) {
				echo '<strong>' . $error . '</strong>';
			}
		?>
		<form method="POST">
			<p><input name="username" type="text" placeholder="Identifiant" /></p>
			<p><input name="password" type="password" placeholder="Mot de passe" /></p>

			<input type="submit" value="Connexion" />
		</form>
	</body>
<html>
<!DOCTYPE html>
<html>
	<head>
		<title>Le framework php | Editer l'email</title>
	</head>
	<body>
		<h1>Changer votre email</h1>
 		<?php echo $msg; ?>
		<form method="POST">
		  <p><input name="newEmail" type="text" placeholder="Adresse e-mail" /></p>

		  <input type="submit" value="Modifier" />
		</form>
	</body>
<html>
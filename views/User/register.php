<!DOCTYPE html>
<html>
	<head>
		<title>Le framework php | Register</title>
	</head>
	<body>
		<h1>S'enregister</h1>
 
		<form method="POST">
		  <p><input name="username" type="text" placeholder="Identifiant" /></p>
		  <p><input name="password" type="text" placeholder="Mot de passe" /></p>
		  <p><input name="email" type="text" placeholder="Adresse e-mail" /></p>
		  <p>
		    <select name="gender">
		      <option>Choisissez</option>
		      <option value="M">Homme</option>
		      <option value="F">Femme</option>
		      <option value="NA">Non Renseigné</option>
		    </select>
		  </p>
		 
		  <input type="submit" value="S'enregister" />
		</form>
	</body>
<html>
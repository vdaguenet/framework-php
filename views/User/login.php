<h1>Login</h1>

<?php if (null != $error) : ?>
  <h2>Erreur: <?php echo $error; ?></h2>
<?php endif; ?>

<form method="POST">
  <p><input name="username" type="text" placeholder="Identifiant" /></p>
  <p><input name="password" type="password" placeholder="Mot de passe" /></p>
  
  <input type="submit" value="Connexion" />
</form>
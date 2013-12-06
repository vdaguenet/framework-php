<h1>S'enregister</h1>

<?php if (null != $error) : ?>
  <h2>Erreur: <?php echo $error; ?></h2>
<?php endif; ?>

<form method="POST">
  <p><input name="username" type="text" placeholder="Identifiant" /></p>
  <p><input name="password" type="text" placeholder="Mot de passe" /></p>
  <p><input name="email" type="text" placeholder="Adresse e-mail" /></p>
  <p>
    <select name="gender">
      <option>Choisissez</option>
      <option value="M">Homme</option>
      <option value="F">Femme</option>
      <option value="NA">NA</option>
    </select>
  </p>
  
  <input type="submit" value="S'enregister" />
</form>
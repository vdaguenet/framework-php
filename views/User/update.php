<h1>Mise à jour de l'email</h1>

<?php if (null != $error) : ?>
  <h2>Erreur: <?php echo $error; ?></h2>
<?php endif; ?>

<p>Votre e-mail actuel : <?php echo $user->getEmail(); ?></p>

<form method="POST">
  <p><input name="email" type="text" placeholder="E-mail" /></p>

  <input type="submit" value="Mettre à jour" />
</form>
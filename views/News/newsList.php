<!DOCTYPE html>
<html>
	<head>
		<title>Le framework php | liste des news</title>
	</head>
	<body>
		<h1>Liste des news</h1>

		<h3><?php echo $msg; ?></h3>

		<?php foreach ($newsList as $news) : ?>
			<form method="POST">
				<p>ID : <?php echo $news->getId(); ?> <input type="hidden" name="id" value="<?php echo $news->getId(); ?>"></p>
				<p>titre : <?php echo $news->getTitle(); ?></p>
				<p>auteur : <?php echo $news->getAuthor(); ?></p>
				<p>contenu : <?php echo $news->getContent(); ?></p>
				<p><input type="submit" value="Supprimer" /></p>
				<p>____________________________________________</p>
		  </form>
		<?php endforeach; ?>
	</body>
<html>

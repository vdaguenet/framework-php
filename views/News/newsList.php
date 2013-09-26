<!DOCTYPE html>
<html>
	<head>
		<title>Le framework php | liste des news</title>
	</head>
	<body>
		<h1>Liste des news</h1>
		<?php foreach ($newsList as $news) : ?>
		  <p>ID : <?php echo $news->getId(); ?></p>
		  <p>titre : <?php echo $news->getTitle(); ?></p>
		  <p>auteur : <?php echo $news->getAuthor(); ?></p>
		  <p>contenu : <?php echo $news->getContent(); ?></p>
		  <p>____________________________________________</p>
		<?php endforeach; ?>
	</body>
<html>

<!DOCTYPE html>
<html>
	<head>
		<title>Le framework php | Index</title>
	</head>
	<body>
		<p>Salut ! Tu es sur l'index <?php echo $pseudo; ?> ! Voir la <a href="?controller=News&page=index">Partie des news</a></p>

		<p>
			<?php 
			if('' != $pseudo) {
			?>
				<a href="?controller=User&page=logout">Se déconnecter</a> ou <a href="?controller=User&page=editEmail">Changer d'email</a>
			<?php
			}
			else {
			?>
				<a href="?controller=User&page=login">Se connecter</a> ou <a href="?controller=User&page=register">S'identifier</a>
			<?php
			}
			?>
		</p>
	</body>
<html>
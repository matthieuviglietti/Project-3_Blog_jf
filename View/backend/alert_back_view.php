<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="User/style.css" rel="stylesheet"/>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea',
					  language_url : 'User/Language/fr_FR.js',
					  branding : false,
					  width : 790,
					  height: 600});</script>
<title>Administration du blog</title>
</head>

<body>
	
	<header class="header">
	<div id="logo">
		<h1>Jean Forteroche</h1>
		<h2>Acteur - Écrivain</h2>
	</div>
	
	<nav id="nav">
		<ul>
			<li><a href="root.php?action=board">Publier un épisode</a></li>
			<li><a href="root.php?action=listp">Épisodes</a></li>
			<li><a id="current" href="root.php?action=alertcb">Commentaires signalés</a></li>
			<li><a href="logout_view.php">Se déconnecter</a></li>
		</ul>
	</nav>
	</header>
	
	<h3>Liste des commentaires signalés par les lecteurs</h3>
	<?php
	
	while ($alert = $alertlist->fetch())
	{
		echo 'Auteur : '.$alert['author'].'<br/>
			  Date du commentaire : '.$alert['comment_date'].'<br/>
			  Commentaire : '.$alert['comment'].'<br/>';
	}
		
	
	?>
	
	<a>Supprimer le commentaire</a>
	<a>Modérer le commentaire</a>
	
	
</body>
</html>
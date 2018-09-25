<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="User/style.css" rel="stylesheet"/>
<title>Administration du site - liste des posts</title>
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
			<li><a id="current"href="root.php?action=listp">Épisodes</a></li>
			<li><a href="root.php?action=alertcb">Commentaires signalés</a></li>
			<li><a href="logout_view.php">Se déconnecter</a></li>
		</ul>
	</nav>
	</header>
	
	<h2>Liste des épisodes déjà diffusés</h2>
	
	<?php
	while ($datapost = $listposts->fetch())
	{
		echo 'Titre de l\'épisode :' .$datapost['title']. '<br/>
			'.nl2br($datapost['content']);
			
	}
	?>
</body>
</html>
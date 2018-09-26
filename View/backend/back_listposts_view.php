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
			<li><a href="index.php?action=board">Publier un épisode</a></li>
			<li><a id="current"href="index.php?action=listp">Épisodes</a></li>
			<li><a href="index.php?action=alertcb">Commentaires signalés</a></li>
			<li><a href="index.php?action=logout.php">Se déconnecter</a></li>
		</ul>
	</nav>
	</header>
	
	<h3>Liste des épisodes déjà diffusés</h3>
	
	<div id="container">
	<?php
	while ($datapost = $listposts->fetch())
	{
	?>
		
			<section id="title">
				<h4>" <?=$datapost['title']?> "</h4>
				<aside id="button">
					<a id="suppr" href="index.php?action=deletepconf&amp;id=<?=$datapost['id']?>">Supprimer</a>
					<a id="update" href="index.php?action=updatepview&amp;id=<?=$datapost['id']?>">Modifier</a>
				</aside>
			</section>
		
	<?php
	}
	?>
	</div>
</body>
</html>
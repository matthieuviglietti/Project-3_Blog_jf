<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<link rel="shortcut icon" type="image/x-icon" href="User/images/favicon.ico">
<link href="User/style/style-back.css" rel="stylesheet"/>
<title>Administration du site - liste des épisodes</title>
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
			<li><a href="index.php?action=logout">Se déconnecter</a></li>
		</ul>
	</nav>
	</header>

	<h3>Liste des épisodes déjà diffusés</h3>

	<div id="container">
	<?php
	while ($datapost = $listposts->fetch())
	{
		date_default_timezone_set('Europe/Paris');
		if (strtotime($datapost['post_date']) <= strtotime(date('Y-m-d H:i:s') ."\n"))
		{
		?>

			<section id="title">
				<h4>"Épisode n°<?= htmlspecialchars($datapost['chapter'])?> :<br/> <?=htmlspecialchars($datapost['title'])?> "</h4>
				<aside class="button">
					<a class="suppr" href="index.php?action=deletepconf&amp;id=<?=htmlspecialchars($datapost['id'])?>">Supprimer</a>
					<a class="update" href="index.php?action=updatepview&amp;id=<?=htmlspecialchars($datapost['id'])?>">Modifier</a>
				</aside>
			</section>

		<?php
		}
		else
		{
		?>
			<section id="titlefuture">
				<h4>"Épisode n°<?= htmlspecialchars($datapost['chapter'])?> :<br/> <?=htmlspecialchars($datapost['title'])?> "</h4>
				<aside class="button">
					<a class="suppr" href="index.php?action=deletepconf&amp;id=<?=htmlspecialchars($datapost['id'])?>">Supprimer</a>
					<a class="update" href="index.php?action=updatepview&amp;id=<?=htmlspecialchars($datapost['id'])?>">Modifier</a>
				</aside>
			</section>
		<?php
		}
	}
	$listposts->closeCursor();
	?>
	</div>
</body>
</html>

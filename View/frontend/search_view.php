<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="User/style-front.css" rel="stylesheet"/>
<title>-Blog - Jean Forteroche - Recherche</title>
</head>
	
<header class="header">
		<a href="index.php">
			<div id="logo">
				<h1>Jean Forteroche</h1>
				<h2>Acteur - Écrivain</h2>
			</div>
		</a>
		
		<div id="containsearch">
			<a id="home" href="index.php">Accueil</a>
			<div id="sb-search">
				<form id="searchform" method="get" action="index.php">
					<input type="hidden" name="action" value="search">
					<button type="submit"><span class="sb-search-submit"></span></button>
					<input class="sb-search-input" placeholder="Rechercher un épisode..." type="search" name="search">
				</form>
			</div>
		</div>
	
	</header>
<body>
	
	<section id="searchsection">
		<p>Votre recherche : <strong><?=htmlspecialchars($keyword)?></strong></p>
		<p>Liste des résultats : </p>
	
		<?php

		while ($searchresults = $search->fetch())
		{
			?>
			<a id="searchresults" href="index.php?action=postfront&id=<?=$searchresults['id']?>">Épisode n°<?=$searchresults['chapter']?> : <?=$searchresults['title']?></a></br>
			<?php
			}

		if ($search->rowCount() == 0)
		{
			echo "Aucun résultat";
		}
		?>
	</section>
	
	<footer><a href="index.php?action=gotologin">Administration du blog</a></footer>
	
	<script type="text/javascript" id="cookiebanner"
 	src="https://cdn.jsdelivr.net/gh/dobarkod/cookie-banner@1.2.2/dist/cookiebanner.min.js"
	data-height="60px"
	data-bg="#59767F"
	data-message="Pour un fonctionnement optimal notre site utilise des cookies. En continuant la navigation vous accepter l'utilisation de ceux-ci."
	data-linkmsg="En savoir plus"
	data-expires="31536000"
	data-moreinfo="https://www.cnil.fr/fr/cookies-traceurs-que-dit-la-loi">
	</script>
	
</body>
</html>
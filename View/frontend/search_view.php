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
				<form method="get" action="index.php">
					<input type="hidden" name="action" value="search">
					<input class="sb-search-input" placeholder="Rechercher un épisode..." type="search" name="search">
					<button type="submit"><span class="sb-search-submit"></span></button>
				</form>
			</div>
		</div>
	
	</header>
<body>
	
	<p>Votre recherche : <?=htmlspecialchars($keyword)?></p>
		<p>Liste des résultats : </p>
	<?php
	
	while ($searchresults = $search->fetch())
	{
		?>
		<a href="index.php?action=postfront&id=<?=$searchresults['id']?>">Épisode n°<?=$searchresults['chapter']?> : <?=$searchresults['title']?></a></br>
		<?php
		}
		
	if ($search->rowCount() == 0)
	{
		echo "Aucun résultat";
	}
	?>
	
</body>
</html>
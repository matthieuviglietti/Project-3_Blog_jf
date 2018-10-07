<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>-Blog - Jean Forteroche - Recherche</title>
</head>

<body>
	
	<p>Votre recherche : <?=htmlspecialchars($keyword)?></p>
		<p>Liste des résultats : </p>
	<?php
	
		if ($searchresults = $search->fetch())
		{
			while ($searchresults = $search->fetch())
				{
				?>
					<a href="index.php?action=postfront&id=<?=$searchresults['id']?>">Épisode n°<?=$searchresults['chapter']?> : <?=$searchresults['title']?></a></br>
				<?php
				}
		}
		else{			
			echo 'Votre recherche n\'a donné aucun résultat <a href="index.php">Revenir à la liste des épisodes</a>';
		}
	
		
	?>
	
</body>
</html>
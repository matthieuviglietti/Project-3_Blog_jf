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
			<li><a href="index.php?action=board">Publier un épisode</a></li>
			<li><a href="index.php?action=listp">Épisodes</a></li>
			<li><a id="current" href="index.php?action=alertcb">Commentaires signalés</a></li>
			<li><a href="index.php?action=logout">Se déconnecter</a></li>
		</ul>
	</nav>
	</header>
	
	<h3>Liste des commentaires signalés</h3>
	
			
				<?php

				while ($alert = $alertlist->fetch())
				{
				?>
					<section id="containcomments">
						<article id="alertc">
							<aside id="info">
								<p><strong>Auteur :</strong> <?= htmlspecialchars($alert['author'])?></p>
								<p><strong>Date du commentaire :</strong> <?= htmlspecialchars($alert['comment_date_fr'])?></p>
								<p><strong>Commentaire :</strong> <?= nl2br($alert['comment'])?></p>
							</aside>
							<aside class="buttonc">
								<a class="suppr" href="index.php?action=deletec&amp;commentid=<?=$alert['id']?>">Supprimer</a>
								<a class="update" href="index.php?action=validatec&amp;commentid=<?=$alert['id']?>">Valider</a>	
							</aside>
						</article>
					</section>
				<?php
				}
				?>
			
	
	
</body>
</html>
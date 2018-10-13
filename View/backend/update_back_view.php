<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="User/style/style-back.css" rel="stylesheet"/>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea',
					  language_url : 'User/Language/fr_FR.js',
					  branding : false,
					  max_width : 790,
					  max_height: 600});</script>
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
			<li><a href="index.php?action=alertcb">Commentaires signalés</a></li>
			<li><a href="index.php?action=logout">Se déconnecter</a></li>
		</ul>
	</nav>
	</header>

<h3>Mettre à jour un épisode</h3>

	<?php

	while ($data = $updatepostview->fetch())
	{
		?>
	<div id="space">
		<form method="post" action="index.php?action=updatep&amp;id=<?=$data['id']?>">
			<label id="titleform" for='title'>Titre de l'épisode : </label><br/>
			<input name="title" type="text" Value="<?=$data['title']?>"/>
			<br/>
			<label  for='chapter'>Épisode n°: </label><br/>
			<input name="chapter" type="text" value="<?=$data['chapter']?>"/>
			<br/>
			<?php date_default_timezone_set('Europe/Paris');?>
			<input name="postdate" type="text" value="<?=$data['post_date_fr']?>" />
			<span>Format : JJ-MM-AAAA HH:MM:SS</span>
			<br/>
			<label id="auhorform" for='author'>Auteur : </label><br/>
			<input name="author" type="text" value="<?=$data['author']?>"/>
			<br/>
			<label id="content" for='content'>Texte de l'épisode : </label><br/><textarea name='content'><?=$data['content']?></textarea>
			<div id="subpost">
				<a href="index.php?action=listp" id="pcancel" type="cancel">Annuler</a>
				<input id="psubmit" type="submit" value="Enregistrer"/>
			</div>
		</form>
	</div>
	<?php
	}
	?>



</body>
</html>

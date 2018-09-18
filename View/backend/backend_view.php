<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea',
					  language_url : '../../User/Language/fr_FR.js',
					  branding : false,
					  width : 700});</script>
<link href="User/style.css" rel="stylesheet"/>
<title>Interface Administration du blog</title>
</head>

<body>
	
	<header class="header">
	<h1>Interface Administration du Blog</h1>
	</header>
	
	<form method="post" action="../../root.php?action=createp">
		<label id="title" for='title'>Titre de l'épisode : </label><input name="title" type="text"/>
		<br/>
		<label id="title" for='title'>Auteur : </label><input name="author" type="text" value="Jean Forteroche"/>
		<br/>
		<label id="content" for='content'>Texte de l'épisode : </label><textarea name='content'></textarea>
		<input type="submit" value="Diffuser l'épisode"/>
	</form>
	
	<h2>Liste des épisodes déjà diffusés</h2>
	
	<?php
	while ($datapost=$req->fetch())
	{
		echo 'Titre de l\'épisode :' .$data['title']. '<br/>
			'.$data['content'];
			
	}
	?>
	
	<h2>Liste des commentaires signalés</h2>
</body>
</html>
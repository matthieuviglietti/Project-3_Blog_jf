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
	
	<form method="post" action="../../index.php">
		<label id="title" for='title'>Titre de l'épisode : </label><input name="title" type="text"/>
		<br/>
		<label id="content" for='content'>Texte de l'épisode : </label><textarea name='content'></textarea>
		<input type="submit" value="Diffuser l'épisode"/>
	</form>
	
	<h2>Liste des épisodes déjà diffusés</h2>
	
	<h2>Liste des commentaires signalés</h2>
</body>
</html>
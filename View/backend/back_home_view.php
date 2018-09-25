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
			<li><a id="current" href="backend_view.php">Publier un épisode</a></li>
			<li><a href="root.php?action=listp">Épisodes</a></li>
			<li><a href="root.php?action=alertcb">Commentaires signalés</a></li>
			<li><a href="logout_view.php">Se déconnecter</a></li>
		</ul>
	</nav>
	</header>
	
	<aside><h3>Publier un nouvel épisode</h3></aside>
	
	<form method="post" action="../../root.php?action=createp">
		<label id="title" for='title'>Titre de l'épisode : </label><br/>
		<input name="title" type="text"/>
		<br/>
		<label id="title" for='title'>Auteur : </label><br/>
		<input name="author" type="text" value="Jean Forteroche"/>
		<br/>
		<label id="content" for='content'>Texte de l'épisode : </label><br/><textarea name='content'></textarea>
		<input id="pcancel" type="cancel" value="Annuler"/>
		<input id="psubmit" type="submit" value="Diffuser l'épisode"/>		
	</form>
	
</body>
</html>
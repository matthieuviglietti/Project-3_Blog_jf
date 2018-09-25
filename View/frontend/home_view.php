<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="User/style-front.css" rel="stylesheet"/>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea',
					  language_url : '../../User/Language/fr_FR.js',
					  branding : false,
					  width : 700});</script>
<title>Administration du blog</title>
</head>

<body>
	
	<header class="header">
		<div id="logo">
			<h1>Jean Forteroche</h1>
			<h2>Acteur - Écrivain</h2>
		</div>
	</header>
	
	<?php
	while ($datapost = $listposts->fetch())
	{
		echo 'Titre de l\'épisode :' .$datapost['title']. '<br/>
			publié par ' .$datapost['author']. 'le ' .$datapost['post_date'].'<br/>'
			.nl2br($datapost['content']).
			'<br/> 
			<a href="index.php?action=postfront&amp;id='.$datapost["id"].'">Commentaires</a> <br/>';		
	}
	?>
	
	<footer><a href="User/View/connexion.php">Admin</a></footer>
	
	
	
</body>
</html>	
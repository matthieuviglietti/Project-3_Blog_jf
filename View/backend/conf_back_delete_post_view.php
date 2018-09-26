<!doctype html>
<html>
<head>
<link href="User/style-login.css" rel="stylesheet"/>
<meta charset="UTF-8">
<title>Confirmation suppression Post</title>
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
			<li><a id="current" href="index.php?action=listp">Annuler</a></li>
			<li><a href="index.php?action=alertcb">Commentaires signalés</a></li>
			<li><a href="index.php?action=logout">Se déconnecter</a></li>
		</ul>
	</nav>
	</header>
	
	<form id="login" action="index.php?action=deletep&amp;id=<?=$_GET['id']?>" method="post">
	  <input id="submitsuppr" type="submit" value="Confirmer la suppression ?"/>
	</form>
	
</body>
</html>
<!doctype html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<link rel="shortcut icon" type="image/x-icon" href="User/images/favicon.ico">
<link href="User/style/style-login.css" rel="stylesheet"/>
<meta charset="UTF-8">
<title>Adminstration du blog - Confirmation suppression Post</title>
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

	<form id="login" action="index.php?action=deletep&amp;id=<?=htmlspecialchars($_GET['id'])?>" method="post">
	  <input id="submitsuppr" type="submit" value="Confirmer la suppression ?"/>
	</form>

</body>
</html>

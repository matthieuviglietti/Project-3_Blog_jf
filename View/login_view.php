<!doctype html>
<html>
<head>
<link href="User/style/style-login.css" rel="stylesheet"/>
<meta charset="UTF-8">
<title>Administration - Login</title>
</head>

<body>

	<header class="header">
		<a href="index.php">
			<div id="logo">
				<h1>Jean Forteroche</h1>
				<h2>Acteur - Écrivain</h2>
			</div>
		</a>

		<a id="home" href="index.php">Accueil</a>

	</header>

	<form id="login" action="index.php?action=login" method="post">
		<label id="name" for='name'>Identifiant : </label><input id="label" name="name" type="text"/>
		<br/>
	  <label id="pass" for='pass'>Mot de passe : </label><input name="pass" type="password"/>
		<br/>
	  <input id="submit" type="submit" value="Se connecter"/>
	</form>

</body>
</html>

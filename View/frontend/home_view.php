<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="User/style-front.css" rel="stylesheet"/>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea',
					  language_url : '../../User/Language/fr_FR.js',
					  branding : false,});</script>
<title>Accueil bog Jean Forteroche</title>
</head>

<body>

	<header class="header">
		<a href="index.php">
			<div id="logo">
				<h1>Jean Forteroche</h1>
				<h2>Acteur - Écrivain</h2>
			</div>
		</a>
		
		<div id="containsearch">
			<a id="home" href="index.php">Accueil</a>
			<div id="sb-search">
				<form id="searchform" method="get" action="index.php">
					<input type="hidden" name="action" value="search">
					<button type="submit"><span class="sb-search-submit"></span></button>
					<input class="sb-search-input" placeholder="Rechercher un épisode..." type="search" name="search">
				</form>
			</div>
		</div>
	
	</header>
	
	<?php
	while ($datapost = $listposts->fetch())
	{
		date_default_timezone_set('Europe/Paris');
		$cut = substr($datapost['content'], 0, 800);
		
		if (strtotime($datapost['post_date']) <= strtotime(date('Y-m-d H:i:s') ."\n"))
		{
			?>

			<div id="container">
				<section id="title">
					<h4>"Épisode n°<?= htmlspecialchars($datapost['chapter'])?> : <?= nl2br($datapost['title'])?>"</h4><br/>
					<p class="book">Un billet simple pour l'Alaska</p>
					<p class="author">publié par <em><?=$datapost['author']?></em> le <?= $datapost['post_date_fr']?></p><br/>
				</section>
			<?php	
				if (strlen( $datapost['content'] < 800))
				{
					?>
					<article id="content">
						<?=$cut.'...</p>'?>
						<a id="read" href="index.php?action=postfront&amp;id=<?=$datapost['id']?>">Lire la suite</a> 
					</article>
				<?php
				}
				else{
					?>
					<article id="content">
						<?=$cut?>
						<a id="read" href="index.php?action=postfront&amp;id=<?=$datapost['id']?>">Lire la suite</a> 
					</article>
				<?php
				}
				?>
			</div>
			<?php
		}
		else
		{
			?>

			<div id="containerfuture">
				<section id="titlefuture">
				</section>
		
				<article id="contentfuture">
					<div id="soon">
						<h4 class="grey">Épisode n°<?= htmlspecialchars($datapost['chapter'])?></h4><br/> 
						<h4 class="grey"><?=$datapost['post_date_fr']?></h4>
					</div>
				</article>
				<?php
				}
				?>
			</div>
			<?php
		
	}
			?>
	
	<footer><a href="index.php?action=gotologin">Administration du blog</a></footer>
	
	<script type="text/javascript" id="cookiebanner"
 	src="https://cdn.jsdelivr.net/gh/dobarkod/cookie-banner@1.2.2/dist/cookiebanner.min.js"
	data-height="60px"
	data-bg="#59767F"
	data-message="Pour un fonctionnement optimal notre site utilise des cookies. En continuant la navigation vous accepter l'utilisation de ceux-ci."
	data-linkmsg="En savoir plus"
	data-expires="31536000"
	data-moreinfo="https://www.cnil.fr/fr/cookies-traceurs-que-dit-la-loi">
	</script>
	
</body>
</html>	
<!doctype html>

<html>
<head>
<meta charset="UTF-8">
<link href="User/style/style-front.css" rel="stylesheet"/>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea',
					  language_url : 'User/Language/fr_FR.js',
					  branding : false,
					  width : 520});</script>
<title>Administration du blog</title>
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
				<form method="get" action="index.php">
					<input type="hidden" name="action" value="search">
					<input class="sb-search-input" placeholder="Rechercher un épisode..." type="search" name="search">
					<button type="submit"><span class="sb-search-submit"></span></button>
				</form>
			</div>
		</div>

	</header>

	<div class="margintitle">
    	<h5><?=nl2br($post['title'])?></h5>
	</div>


		<div id="postview">
			<span>Publié par <?=$post['author']?> le <?=$post['post_date']?></span> </br>

			<article id='contentpost'><?=$post['content']?></article>
		</div>

		<h6>Lire et réagir</h6>
		<div id="free">
			<div id="comments">
					<form action="index.php?action=createc&amp;id=<?=$post['id']?>" method="post">
						<label name='author'>Votre nom:</label> <input type="text" name="author"/><br/>
						<label name='comment'>Votre commentaire :</label> <textarea type="text" name="comment"></textarea><br/>
						<input class="sendcomment" type="submit" name="submit" value="Envoyer"/>
					</form>
			</div>

		<?php

			if ($getcomment->rowCount()==0)
			{
				echo "Il n'y a pas encore de commentaire";
			}
			while ($comment = $getcomment->fetch())
			{
			?>
			<section id="backcomments">
				<aside id="separatecomments">
					<p><strong class="brown"><?= htmlspecialchars($comment['author']) ?></strong><em class="date"> - le <?= htmlspecialchars($comment['comment_date']) ?><a class="brown" id="alert" href="index.php?action=alertc&amp;commentid=<?= htmlspecialchars($comment['id'])?>&amp;id=<?= htmlspecialchars($post['id'])?>"> - Signaler le commentaire</a></em></p>
					<p><?= htmlspecialchars(nl2br($comment['comment']))?></p>
				</aside>
			</section>
			<?php
			}
			?>
		</div>




	<footer><a href="index.php?action=gotologin">Administration du blog</a></footer>

    </body>
</html>

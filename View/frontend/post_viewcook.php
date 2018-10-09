<!doctype html>

<html>
<head>
<meta charset="UTF-8">
<link href="User/style-front.css" rel="stylesheet"/>
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
				<form id="searchform" method="get" action="index.php">
					<input type="hidden" name="action" value="search">
					<button type="submit"><span class="sb-search-submit"></span></button>
					<input class="sb-search-input" placeholder="Rechercher un épisode..." type="search" name="search">
				</form>
			</div>
		</div>
	
	</header>
	
	<div class="margintitle">
    	<h5><?=nl2br($post['title'])?></h5>
	</div>
	
	
		<div id="postview">
			<p id="author">Publié par <?=$post['author']?> le <?=$post['post_date']?></p>

			<article id='contentpost'><?=$post['content']?></article>
		</div>
	
	
		<h6>Lire et réagir</h6>
	
		<?php
			if (isset ($_COOKIE['pseudo']))
			{
			?>
				<div id="free">
			<div id="comments">
					<form action="index.php?action=createc&amp;id=<?=$post['id']?>" method="post">
						<label name='author'>Votre nom:</label></br> <input type="text" name="author" value="<?=$_COOKIE['pseudo']?>"/><br/>
						<label name='comment'>Votre commentaire :</label> <textarea type="text" name="comment"></textarea><br/>
						<div id="flex">
							<input id="submitc" type="submit" name="submit" value="Envoyer"/>
						</div>
					</form>
			</div>
			<?php
			}
			else{
				?>
				<div id="free">
			<div id="comments">
					<form action="index.php?action=createc&amp;id=<?=$post['id']?>" method="post">
						<label name='author'>Votre nom:</label></br> <input type="text" name="author" value=""/><br/>
						<label name='comment'>Votre commentaire :</label> <textarea type="text" name="comment"></textarea><br/>
						<div id="flex">
							<input id="submitc" type="submit" name="submit" value="Envoyer"/>
						</div>
					</form>
			</div>
			<?php
			}

			if ($getcomment->rowCount()==0)
			{
			?>
				<p id="text">Il n'y a pas encore de commentaire sur cet épisode</p>
			<?php
			}
			while ($comment = $getcomment->fetch())
			{
				if ($comment['alert'] == 1)
				{
					?>
					<section id="backcomments">
						<aside id="separatecomments">
							<p><strong class="brown"><?= htmlspecialchars($comment['author']) ?></strong><em class="date"> - le <?= htmlspecialchars($comment['comment_date']) ?><a class="brown" id="alert" href="index.php?action=alertc&amp;commentid=<?= htmlspecialchars($comment['id'])?>&amp;id=<?= htmlspecialchars($post['id'])?>"> - <span class="red">Commentaire signalé</span></a></em></p>
							<p><?= nl2br($comment['comment'])?></p>
						</aside>
					</section>
					<?php
				}
				
				elseif ($comment['alert'] == 2)
				{
					?>
					<section id="backcomments">
						<aside id="separatecomments">
							<p><strong class="brown"><?= htmlspecialchars($comment['author']) ?></strong><em class="date"> - le <?= htmlspecialchars($comment['comment_date']) ?> - <span class="brown">Commentaire modéré par l'auteur</span></em></p>
							<p><?= nl2br($comment['comment'])?></p>
						</aside>
					</section>
					<?php
				}
				
				else
				{
					?>
					<section id="backcomments">
						<aside id="separatecomments">
							<p><strong class="brown"><?= htmlspecialchars($comment['author']) ?></strong><em class="date"> - le <?= htmlspecialchars($comment['comment_date']) ?><a class="brown" id="alert" href="index.php?action=alertc&amp;commentid=<?= htmlspecialchars($comment['id'])?>&amp;id=<?= htmlspecialchars($post['id'])?>"> - Signaler le commentaire</a></em></p>
							<p><?= nl2br($comment['comment'])?></p>
						</aside>
					</section>
					<?php
				}
			
			}
			?>
			
			<p id="pagination">
				<?php

				echo 'Page : ';

				for ($i = 1 ; $i <= $totalpagecomments ; $i++)
				{
					if ($i == $page)
					{
						echo '<strong class="brown">' . $i . '<strong></a> ';
					}
					else
					{
						echo '<a href="index.php?action=postfront&page=' . $i . '&id='.$post['id'].'">' . $i . '</a> ';
					}
					
				}
				?>
			</p>
		</div>
	
		
 	
	
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
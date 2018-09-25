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
	
		echo 'Un nouvel épisode : '.$post['title'].'<br/> Publié par : '.$post['author'].' le '.$post['post_date'].'<br/>'.$post['content'];
	
        while ($comment = $getcomment->fetch())
        {
        ?>
            <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['comment']))?><a href="root.php?action=alertc&amp;commentid=<?= (htmlspecialchars($comment['id']))?>&amp;id=<?= (htmlspecialchars($post['id']))?>"><br/>
			Signaler le commentaire</a></p>
            <a href="index.php?action=listpfront>">Retour aux épisodes</a>

        <?php
        }
        ?>

       	<h2>Ajouter un commentaire</h2>
	
		<div id="comments">
			<form action="index.php?action=createc&amp;id=<?=$post['id']?>" method="post">
				<label name='author'>Votre nom:</label> <input type="text" name="author"/><br/>
				<label name='comment'>Votre commentaire :</label> <input type="text" name="comment"/><br/>
				<input type="submit" name="submit" value="Envoyer"/>
			</form>
		</div>

    </body>
</html>
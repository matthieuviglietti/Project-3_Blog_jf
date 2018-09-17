<?php

namespace MV\Blog;
use PDO;

require_once('Model/Backend/Manager.php');

class CommentManager extends Manager;
{
	public function newComment($postid, $author, $comment)
	{
		$Manager =new Manager; 
		$db = $Manager->dbConnect();
		$req = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(:postid, :author, :comment, NOW())');
		$req->execute(array(
			'postid' => $postid,
			'author' => $author,
			'comment' => $comment));
		
		return $req;
	}
	
	public function getComments($postid)
	{
		$Manager =new Manager; 
		$db = $Manager->dbConnect();
		$req = $db->prepare('SELECT author, comment, comment_date FROM comments WHERE postid = ?');
		$comment = $req->execute(array($postid));
		
		return $comment;
	}
	
	public function selectComment($commentid);
	{
		$Manager =new Manager; 
		$db = $Manager->dbConnect();
		$req = $db->prepare('SELECT post_id, comment, comment_date WHERE id = ?');
		$req->execute(array($commentid));
		
		return $req;
	}
	
	public function updateComment($commentid)
	{
		$Manager =new Manager; 
		$db = $Manager->dbConnect();
		$req = $db->prepare('UPDATE comment, comment_date SET comment = ?, comment_date = NOW() WHERE id= ?');
		$req->execute(array($commentid));
		$update = $req->fetch();
		
		return $update;
	}
		
	public function deleteCommment($commentid)
	{
		$Manager =new Manager; 
		$db = $Manager->dbConnect();
		$req = $db->prepare('DELETE FROM comments WHERE id = ?');
		$req->execute(array($commentid));
		
		return $req;
	}
}
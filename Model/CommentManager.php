<?php

require_once('Model/Manager.php');

class CommentManager extends Manager
{
	public function newComment($postid, $author, $comment)
	{ 
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(:postid, :author, :comment, NOW())');
		$req->execute(array(
			'postid' => $postid,
			'author' => $author,
			'comment' => $comment));
		
		return $req;
	}
	
	public function getComments($postid)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT post_id, id, author, comment, comment_date FROM comments WHERE post_id= ?');
		$req->execute(array($postid));
		
		return $req;
	}
	
	public function selectComment($commentid)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, post_id, comment, comment_date WHERE id= ?');
		$req->execute(array($commentid));
		
		return $req;
	}
	
	public function updateComment($commentid)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE comments SET comment= ?, comment_date = NOW() WHERE id= ?');
		$req->execute(array($commentid));
		
		return $update;
	}
		
	public function deleteCommment($commentid)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM comments WHERE id= ?');
		$req->execute(array($commentid));
		
		return $req;
	}
	
	public function alertComment($commentid)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE comments SET alert= "1" WHERE id= ?');
		$req->execute(array($commentid));
		
		return $req;
	}
	
	public function alertList()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT comment, author, comment_date FROM comments WHERE alert= "1"');
		
		return $req;
		
	}
}
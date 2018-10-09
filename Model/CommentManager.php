<?php

require_once('Model/Manager.php');

class CommentManager extends Manager
{
	public function newComment($postid, $author, $comment)
	{ 
		$temps=365*24*3600;

		setcookie("pseudo", $author, time()+$temps);

		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(:postid, :author, :comment, NOW())');
		$req->execute(array(
			'postid' => $postid,
			'author' => $author,
			'comment' => $comment));
		
		return $req;
	}
	
	public function getComments($postid, $start, $limit)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, post_id, author, comment, comment_date FROM comments WHERE post_id= ? ORDER BY comment_date DESC LIMIT '.$start.','.$limit);
		$req->execute(array($postid));
		
		return $req;
	}
	
public function getPagination($postid)
	{
		$db = $this->dbConnect();
		$req=$db->prepare('SELECT COUNT(*) totalc FROM comments WHERE post_id= ?');
		$req->execute(array($postid));
		$totalcomment = $req->fetch();
		
		return $totalcomment;
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
		$req = $db->prepare('UPDATE comments SET comment= "Ce message a été supprimé par l\'administrateur", alert= "2" WHERE id= ?');
		$req->execute(array($commentid));
		
		return $req;
	}
	
	public function validateComment($commentid)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE comments SET alert= "2" WHERE id= ?');
		$req->execute(array($commentid));
		
		return $req;
	}
		
	/*public function deleteCommment($commentid)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM comments WHERE id= ?');
		$req->execute(array($commentid));
		
		return $req;
	}
	*/
	
	public function alertComment($commentid)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE comments SET alert= "1" WHERE id= ? AND alert= "0"');
		$req->execute(array($commentid));
		
		return $req;
	}
	
	public function alertList()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT id, comment, author, comment_date FROM comments WHERE alert= "1"');
		
		return $req;
		
	}
}
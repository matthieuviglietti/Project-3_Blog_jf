<?php

require_once('Model/Manager.php');
class PostManager extends Manager
{

	public function createPost($title, $author, $content)
	{	
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO posts(title, author, content, post_date) VALUES (:title, :author, :content, NOW())');
		$createpost = $req->execute(array(
			'title' => $title,
			'author' => $author,
			'content' => $content));
		
		return $createpost;
	}
	
	public function getPosts()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT id, title, content, author, post_date FROM posts ORDER BY post_date');
		
		return $req;
		
	}
	

	/*public function subMyString( $contenu, $limite, $separateur = '...' ) 
	{
		if( strlen($contenu) >= $limite ) 
		{
			$contenu = substr( $contenu, 0, $limite );
			$contenu = substr( $contenu, 0, strrpos($contenu, ' ') );
			$contenu .= $separateur;
		}
     
    return $contenu;
	}*/

	
	public function getPost($postid)
	{
		$db = $this->dbConnect();
		$get = $db->prepare('SELECT id, title, author, content, post_date FROM posts WHERE id= ?');
		$get->execute(array($postid));
		$getpost = $get->fetch();
		
		return $getpost;
	}
	
	public function updatePost($title, $content, $postid)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE posts SET title = ?, content = ? WHERE id= ?');
		$req->execute(array($title, $content, $postid));
		
		return $req;
	}
	
	public function updatePostview($postid)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, title, author, content FROM posts WHERE id= ?');
		$req->execute(array($postid));
		
		return $req;
	}
	
	public function deletePost($postid)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM posts WHERE id= ?');
		$req->execute(array($postid));
		
		return $req;
	}
}
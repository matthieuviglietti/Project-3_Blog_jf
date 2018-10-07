<?php

require_once('Model/Manager.php');
class PostManager extends Manager
{

	public function createPost($title, $chapter, $author, $content)
	{	
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO posts(title, chapter, author, content, post_date) VALUES (:title, :chapter, :author, :content, NOW())');
		$createpost = $req->execute(array(
			'title' => $title,
			'chapter' => $chapter,
			'author' => $author,
			'content' => $content));
		
		return $createpost;
	}
	
	public function getPosts()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT id, title, chapter, content, author, post_date FROM posts ORDER BY post_date');
		
		return $req;
		
	}
		
     
	public function getPost($postid)
	{
		$db = $this->dbConnect();
		$get = $db->prepare('SELECT id, title, chapter, author, content, post_date FROM posts WHERE id= ?');
		$get->execute(array($postid));
		$getpost = $get->fetch();
		
		return $getpost;
	}
	
	public function updatePost($title, $chapter, $content, $postid)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE posts SET title = ?, chapter= ?, content = ? WHERE id= ?');
		$req->execute(array($title, $chapter, $content, $postid));
		
		return $req;
	}
	
	public function updatePostview($postid)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, title, chapter, author, content FROM posts WHERE id= ?');
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
	
	public function getSearch($keyword)
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT id, title, chapter FROM posts WHERE title LIKE "%'.$keyword.'%" OR chapter LIKE "%'.$keyword.'%" OR content LIKE "%'.$keyword.'%"');
		
		return $req;
		
	}
}
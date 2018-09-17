<?php
namespace MV\Blog;
use PDO;
require_once('Model/Backend/Manager.php');
class PostManager extends Manager
{
	private var $_db
		
	private function init()
	{
		$Manager =new Manager; 
		$_db = $Manager->dbConnect();
	}
	
	public function createPost($title, $author, $content)
	{	
		$req = $_db->prepare('INSERT INTO posts(title, author, content, post_date) VALUES (:title, :author, :content, NOW())');
		$createpost = $req->execute(array(
			:title => $title
			:author => $author,
			:content => $content,));
		
		return $createpost;
	}
	
	public function getPosts()
	{
		$req = $_db->query('SELECT title, content, author, post_date FROM posts ORDER BY post_date DESC');
		
		return $req;
		
	}
	
	public function getPost($postid)
	{
		$get = $_db->prepare('SELECT id, title, author, content, post_date FROM posts WHERE id = ?');
		$get->execute(array($postid));
		$getpost = $get->fetch();
		
		return $getpost;
	}
	
	public function updatePost($title, $content, $postid)
	{
		$req = $_db->prepare('UPDATE posts SET title = ?, content = ?, post_date = NOW() WHERE id = ?');
		$req->execute(array($title, $content, $postid));
		
		return $req;
	}
	
	public function deletePost($postid)
	{
		$req = $_db->prepare('DELETE FROM posts WHERE id= ?');
		$req->execute(array($postid));
		
		return $req;
	}
}
<?php

require_once('Model/PostManager.php');
require_once('Model/CommentManager.php');
require_once('Model/AdminManager.php');

class Controlback
{
	public function LogIn($name, $pass)
	{
		$adminmanager= new AdminManager;
		$resultat = $adminmanager->logIn($name, $pass);
		
		$ispasswordCorrect = password_verify($pass, $resultat['pass']);

		if ($ispasswordCorrect)
		{
				session_start();
				$_SESSION['id'] = $resultat['id'];
				$_SESSION['name'] = $name;
				header('Location: root.php?action=logged');
		}
		
		else{
				throw new Exception('L\'identifiant ou le mot de passe est incorrect');
			}
		
	}
	
	public function Logged()
	{
		header('Location: root.php?action=board');
	}
	
	public function Board()
	{
		require('View/backend/back_home_view.php');
	}
	
	public function CreatePost($title, $author, $content)
	{
		$postmanager = new PostManager;
		$createpost = $postmanager->createPost($title, $author, $content);
	
		header('Location:');
	}
		
	public function ListPosts()
	{
		$postmanager = new PostManager;
		$listposts = $postmanager->getPosts();
		
		require('View/backend/back_listposts_view.php');
	}
	
	
	public function UpdatePost($title, $content, $postid)
	{
		$postmanager = new PostManager;
		$updatepost = $postmanager->updatePost($title, $content, $postid);
		
		require('View/frontend/update_back_view.php');
	}
	
	public function DeletePost($postid)
	{
		$postmanager = new PostManager;
		$updatepost = $postmanager->deletePost($postid);
		
		require('View/frontend/back_home_view.php');
	}
		
	//For CommentManager
	
	public function CreateComment($postid, $author, $comment)
	{
		$commentmanager = new CommentManager;
		$createcomment = $commentmanager->newComment($postid, $author, $comment);
		
		return $createcomment;
	}
	
	public function Selectcomment($commentid)
	{
		$commentmanager = new CommentManager;
		$selectComment = $commentmanager->selectComment($commentid);
		
		require('View/frontend/update_back_view.php');
	}
	
	public function AlertList()
	{
		$commentmanager = new CommentManager;
		$alertlist = $commentmanager->alertList();
		
		require('View/backend/alert_back_view.php');
	}
	
	public function Updatecomment($commentid)
	{
		$commentmanager = new CommentManager;
		$UpdateComment = $commentmanager->updateComment();
		
		require('Location: update_back_view.php');
	}
	
	public function Deletecomment($commentid)
	{
		$commentmanager = new CommentManager;
		$DeleteComment = $commentmanager->deleteComment($commentid);
		
		require('Location: update_back_view.php');
	}
}
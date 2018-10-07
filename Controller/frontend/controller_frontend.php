<?php

require_once('Model/PostManager.php');
require_once('Model/CommentManager.php');

class Controlfront
{
	
	//For PostManager 
		
	public function ListPosts()
	{
		$postmanager = new PostManager;
		$listposts = $postmanager->getPosts();
		
		require('View/frontend/home_view.php');
	}
	
	public function Post($postid)
	{
		$postmanager = new PostManager;
		$commentmanager = new CommentManager;
		$post = $postmanager->getPost($postid);
		$getcomment = $commentmanager->getComments($postid); //getcomment for one post
		
		if(isset($_COOKIE['pseudo']))
		{
			require('View/frontend/post_viewcook.php');
		}
		
		else{
			require('View/frontend/post_view.php');
		}
		
	}
	
	public function GetSearch($keyword)
	{
		$postmanager = new PostManager;
		$search = $postmanager->getSearch($keyword);
		
		require('View/frontend/search_view.php');
	}
	

	//For CommentManager
	
	public function CreateComment($postid, $author, $comment)
	{
		$commentmanager = new CommentManager;
		$createcomment = $commentmanager->newComment($postid, $author, $comment);
		
		header('Location: index.php?action=postfront&id='.$postid.'');
	}
	
	public function Alert($commentid, $postid)
	{
		$commentmanager = new CommentManager;
		$alertcomment = $commentmanager->alertComment($commentid);
		
		//Mettre un message merci pour votre signalement
		
		header('Location: index.php?action=postfront&id='.$postid.'');
		
	}
	
}
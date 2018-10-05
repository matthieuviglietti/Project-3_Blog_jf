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
	
	public function Post($postid, $currentpage, $start, $limit)
	{
		$postmanager = new PostManager;
		$commentmanager = new CommentManager;
		$post = $postmanager->getPost($postid);
		$getcomment = $commentmanager->getComments($postid, $start, $limit); //getcomment for one post
		$getpagination = $commentmanager->getPagination($postid);
		$pagenumbers  = ceil($totalcomments / $limit);
		
		if(isset($_COOKIE['pseudo']))
		{
			require('View/frontend/post_viewcook.php&page='.$currentpage);
		}
		
		else{
			require('View/frontend/post_view.php&page='.$currentpage);
		}
		
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
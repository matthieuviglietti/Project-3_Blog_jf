<?php

namespace MV\Blog;

require_once('Model/PostManager.php');
require_once('Model/CommentManager.php');

class Control
{
	
	//For PostManager 
		
	public function ListPosts()
	{
		$postmanager = new MV\Blog\PostManager;
		$listposts = $postmanager->getPosts();
		
		require('View/frontend/home_view.php');
	}
	
	public function Post($postid)
	{
		$postmanager = new MV\Blog\PostManager;
		$commentmanager = new MV\Blog\CommentManager;
		$post = $postmanager->getPost($postid);
		$createcomment = $commentmanager->getComments($postid); //getcomment for one post
		
		require('View/frontend/post_view.php');
	}
	

	//For CommentManager
	
	public function CreateComment($postid, $author, $comment)
	{
		$commentmanager = new MV\Blog\CommentManager;
		$createcomment = $commentmanager->newComment($postid, $author, $comment);
		
		return $createcomment;
	}
	
}
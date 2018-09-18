<?php

namespace MV\Blog;

require_once('Model/PostManager.php');
require_once('Model/CommentManager.php');

class Controlback
{
	
	//For PostManager 
	
	public function CreatePost($title, $author, $content)
	{
		$postmanager = new PostManager;
		$createpost = $postmanager->createPost($title, $author, $content);
	
		header('Location:View/backend/backend_view.php');
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
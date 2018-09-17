<?php

namespace MV\Blog;

require_once('Model/PostManager.php');
require_once('Model/CommentManager.php');

class Control
{
	
	//For PostManager 
	
	public function CreatePost($title, $author, $content)
	{
		$postmanager = new MV\Blog\PostManager;
		$createpost = $postmanager->createPost($title, $author, $content);
		
		return $createpost;
		
		require('View/frontend/back_listposts_view.php');
	}
		
	public function ListPosts()
	{
		$postmanager = new MV\Blog\PostManager;
		$listposts = $postmanager->getPosts();
		
		require('View/frontend/back_listposts_view.php');
	}
	
	
	public function UpdatePost($title, $content, $postid)
	{
		$postmanager = new MV\Blog\PostManager;
		$updatepost = $postmanager->updatePost($title, $content, $postid);
		
		require('View/frontend/update_back_view.php');
	}
	
	public function DeletePost($postid)
	{
		$postmanager = new MV\Blog\PostManager;
		$updatepost = $postmanager->deletePost($postid);
		
		require('View/frontend/back_home_view.php');
	}
		
	//For CommentManager
	
	public function CreateComment($postid, $author, $comment)
	{
		$commentmanager = new MV\Blog\CommentManager;
		$createcomment = $commentmanager->newComment($postid, $author, $comment);
		
		return $createcomment;
	}
	
	public function Selectcomment($commentid)
	{
		$commentmanager = new CommentManager;
		$selectComment = $commentmanager->selectComment($commentid);
		
		require('View/frontend/update_back_view.php')
	}
}
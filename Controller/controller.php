<?php

namespace MV\Blog;

require_once('Model/Backend/PostManager.php');
require_once('Model/Backend/Manager.php');
require_once('Model/Backend/CommentManager.php');

class Control
{
	public function CreatePost($title, $author, $content)
	{
		$postmanager = new MV\Blog\PostManager;
		$createpost = $postmanager->createPost($title, $author, $content);
		
		return $createpost;
	}
		
	public function ListPosts()
	{
		$postmanager = new MV\Blog\PostManager;
		$listposts = $postmanager->getPosts();
		
		require('View/frontend/home_view.php');
	}
	
	public function Post($postid)
	{
		$postmanager = new MV\Blog\PostManager;
		$post = $postmanager->getPost($postid);
		
		require('View/frontend/post_view.php');
	}
	
	public function UpdatePost($title, $content, $postid)
	{
		$postmanager = new MV\Blog\PostManager;
		$updatepost = $postmanager->updatePost($title, $content, $postid);
		
		require('View/frontend/home_view.php');
	}
	
	public function DeletePost($postid)
	{
		$postmanager = new MV\Blog\PostManager;
		$updatepost = $postmanager->deletePost($postid);
		
		require('View/frontend/home_view.php');
	}
		
}
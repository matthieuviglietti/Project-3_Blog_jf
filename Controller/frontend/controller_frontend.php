<?php

require_once('Model/PostManager.php');
require_once('Model/CommentManager.php');

class Controlfront
{
	private $_postmanager;
	private $_commentmanager;
	
	public function __construct()
	{
		$this->_postmanager= new PostManager();
		$this->_commentmanager= new CommentManager();
	}
		
	public function ListPosts()
	{
		$listposts = $this->_postmanager->getPosts();
		
		require('View/frontend/home_view.php');
	}
	
	public function Post($postid, $start, $limit, $page) //getcomment for one post
	{
		$post = $this->_postmanager->getPost($postid);
		$getcomment = $this->_commentmanager->getComments($postid, $start, $limit); 
		$totalcomments = $this->_commentmanager->getPagination($postid);
		$total = $totalcomments['totalc']; //Pagination
		$totalpagecomments = ceil($total / $limit); //Pagination

		require('View/frontend/post_viewcook.php');
		
	}
	
	public function GetSearch($keyword)
	{
		$search = $this->_postmanager->getSearch($keyword);
		
		require('View/frontend/search_view.php');
	}

	public function CreateComment($postid, $author, $comment)
	{
		$createcomment = $this->_commentmanager->newComment($postid, $author, $comment);
		
		header('Location: index.php?action=postfront&id='.$postid.'');
	}
	
	public function Alert($commentid, $postid)
	{
		$alertcomment = $this->_commentmanager->alertComment($commentid);
		
		header('Location: index.php?action=postfront&id='.$postid.'');
		
	}
	
}
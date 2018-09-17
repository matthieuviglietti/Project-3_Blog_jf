<?php

namespace MV\BLOG;

require_once('Controller/controller.php');

class Root
{
	if (isset($_GET['action']))
	{
		if (isset($_POST['title']) && isset($_POST['author']) && isset($_POST['content']))
		{
			if ($_GET['action'] == 'createp')
			{
				public function CreateP()
				{
					$control = new MV\Blog\Control;
					$CreateP = $control->CreatePost($_POST['title'], $_POST['author'], $_POST['content']);
				}
				
			}
		}
	}
	
	elseif (isset($_GET['action']))
	{
		if ($_GET['action'] == 'listp')
		{
			public function ListP()
			{
				$control = new MV\Blog\Control;
				$ListP = $control->ListPosts();
			}
		}
	}
	
	elseif (isset($_GET['action']))
	{
		if (isset($_GET['postid']))
		{
			if ($_GET['action'] == 'post')
			{
				public function PostAndComments()
				{
					$control = new MV\Blog\Control;
					$PostAndComments = $control->Post($_GET['id']);
				}
				
			}
		}
	}
	
	
	elseif (isset($_GET['action']))
	{
		if (isset($_POST['title']) && isset($_POST['content']) && isset($_GET['id']))
		{
			if ($_GET['action'] == 'updatep')
			{
				public function UpdateP()
				{
					$control = new MV\Blog\Control;
					$UpdateP = $control->updatePost($_POST['title'], $_POST['content'], $_GET['id']);
				}
				
			}
		}
	}
	
	elseif (isset($_GET['action']))
	{
		if (isset($_GET['id']))
		{
			if ($_GET['action'] == 'deletep')
			{
				public function DeleteP()
				{
					$control = new MV\Blog\Control;
					$DeleteP = $control->deletePost($_GET['id']);
				}
				
			}
		}
	}
	
}
<?php

namespace MV\BLOG;

require_once('Controller/controller_frontend.php');
require_once('Controller/controller_backend.php');

class Root
{
	
	private function init()
	{
		$control = new MV\Blog\Control;
	}
	
	public function selectRoot()
	{
		if (isset($_GET['action']))
		{
			if (isset($_POST['title']) && isset($_POST['author']) && isset($_POST['content']))
			{
				if ($_GET['action'] == 'createp')
				{
					$CreateP = $control->CreatePost($_POST['title'], $_POST['author'], $_POST['content']);
				
				}
			}
		}
	
		elseif (isset($_GET['action']))
		{
			if ($_GET['action'] == 'listp')
			{
					$ListP = $control->ListPosts();
			}
		}

		elseif (isset($_GET['action']))
		{
			if (isset($_GET['postid']))
			{
				if ($_GET['action'] == 'post')
				{
						$PostAndComments = $control->Post($_GET['id']);	
				}
			}
		}


		elseif (isset($_GET['action']))
		{
			if (isset($_POST['title']) && isset($_POST['content']) && isset($_GET['id']))
			{
				if ($_GET['action'] == 'updatep')
				{
						$UpdateP = $control->updatePost($_POST['title'], $_POST['content'], $_GET['id']);			
				}
			}
		}

		elseif (isset($_GET['action']))
		{
			if (isset($_GET['id']))
			{
				if ($_GET['action'] == 'deletep')
				{
						$DeleteP = $control->deletePost($_GET['id']);
				}
			}
		}
	}
}
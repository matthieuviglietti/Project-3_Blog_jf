<?php

namespace MV\Blog;

require_once('Controller/frontend/controller_frontend.php');
require_once('Controller/backend/controller_backend.php');

//class Root
//{
	
	//private function init()
	//{
	//	$control = new MV\Blog\Front\Control;
		//$controlb = new MV\Blog\Back\Control;
	
	
	//public function selectRoot()
	//{
		
		if (isset($_GET['action']))
		{
			if ($_GET['action'] == 'createp') 
			{
				if (isset($_POST['title']) && isset($_POST['author']) && isset($_POST['content']))
				{
					$controlb = new Controlback;
					$CreateP = $controlb->CreatePost($_POST['title'], $_POST['author'], $_POST['content']);
				}
				
			}


			elseif ($_GET['action'] == 'listp')
			{
				$controlb = new Controlback;		
				$ListP = $controlb->ListPosts();
			}

			elseif ($_GET['action'] == 'post')
			{
					if (isset($_GET['postid']))
					{
							$PostAndComments = $control->Post($_GET['id']);	
					}
			}


			elseif ($_GET['action'] == 'updatep')
			{
				if (isset($_POST['title']) && isset($_POST['content']) && isset($_GET['id']))
				{
					$UpdateP = $control->updatePost($_POST['title'], $_POST['content'], $_GET['id']);			
				}
			}
			

			elseif ($_GET['action'] == 'deletep')
			{
				if (isset($_GET['id']))
				{
					$DeleteP = $control->deletePost($_GET['id']);
				}
			}

			elseif (isset($_GET['action']))
			{
				if (isset($_GET['id']) && isset($_POST['author']) && isset($_POST['comment'])) 
				{
					if ($_GET['action'] == 'createc')
					{

					}
				}
			}
		}
		else
		{
			header('Location: index.php?action=listp');
		}
	//}
//}

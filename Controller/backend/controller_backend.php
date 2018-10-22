<?php

require_once('Model/PostManager.php');
require_once('Model/CommentManager.php');
require_once('Model/AdminManager.php');

class Controlback
{
	private $_adminmanager;
	private $_postmanager;
	private $_commentmanager;

	public function __construct()
	{
		$this->_adminmanager= new AdminManager();
		$this->_commentmanager= new CommentManager();
		$this->_postmanager= new PostManager();
	}

	public function LoginView()
	{
		require('View/login_view.php');
	}

	//For AdminManager and PostManager

	public function LogIn($name, $pass)
	{
		$resultat = $this->_adminmanager->logIn($name, $pass);

		$ispasswordCorrect = password_verify($pass, $resultat['pass']);

		if ($ispasswordCorrect)
		{
				session_start();
				$_SESSION['id'] = $resultat['id'];
				$_SESSION['name'] = $name;
				header('Location: index.php?action=logged');
		}

		else{
				throw new Exception('L\'identifiant ou le mot de passe est incorrect');
			}
	}

	public function Logged()
	{
		header('Location: index.php?action=board');
	}

	public function LogOut()
	{
		$logout = $this->_adminmanager->logOut();

		require('View/logout_view.php');
	}

	public function Board()
	{
		require('View/backend/back_home_view.php');
	}

	public function CreatePost($title, $chapter, $author, $content, $postdateformat)
	{
		$createpost = $this->_postmanager->createPost($title, $chapter, $author, $content, $postdateformat);

		header('Location: index.php?action=listp');
	}

	public function ListPosts()
	{
		$listposts = $this->_postmanager->getPosts();

		require('View/backend/back_listposts_view.php');
	}


	public function UpdatePost($title, $chapter, $content, $postdateformat, $postid, $postdate)
	{
		$controldate = $this->controlDate($postdate);
		if ($controldate == 1)
		{
			$updatepost = $this->_postmanager->updatePost($title, $chapter, $content, $postdateformat, $postid);

			header('Location: index.php?action=listp');
		}
		else{
			throw new Exception('La date et ou l\'heure n\'ont pas le bon format');
		}
	}

	public function controlDate($postdate)
	{
		$pattern = "`^([0-2]\d|[3][0-1])\-([0]\d|[1][0-2])\-([2][01]|[1][6-9])\d{2}(\s([0-1]\d|[2][0-3])(\:[0-5]\d){1,2})?$`";
		$controldate = preg_match($pattern, $postdate);
		return $controldate;
	}

	public function updatePostView($postid)
	{
		$updatepostview = $this->_postmanager->updatePostview($postid);

		require('View/backend/update_back_view.php');
	}

	public function deletePostconf($postid)
	{
		require('View/backend/conf_back_delete_post_view.php');
	}

	public function DeletePost($postid)
	{
		$updatepost = $this->_postmanager->deletePost($postid);

		header('Location: index.php?action=listp');
	}

	//For CommentManager

	public function CreateComment($postid, $author, $comment)
	{
		$createcomment = $this->_commentmanager->newComment($postid, $author, $comment);

		return $createcomment;
	}

	public function Selectcomment($commentid)
	{
		$selectComment = $this->_commentmanager->selectComment($commentid);

		require('View/frontend/update_back_view.php');
	}

	public function AlertList()
	{
		$alertlist = $this->_commentmanager->alertList();

		require('View/backend/alert_back_view.php');
	}

	public function Updatecomment($commentid)
	{
		$UpdateComment = $this->_commentmanager->updateComment($commentid);

		header('Location: index.php?action=alertcb');
	}

	public function Validatecomment($commentid)
	{
		$UpdateComment = $this->_commentmanager->validateComment($commentid);

		header('Location: index.php?action=alertcb');
	}

	public function Deletecomment($commentid)
	{
		$DeleteComment = $this->_commentmanager->deleteComment($commentid);

		require('Location: update_back_view.php');
	}
}

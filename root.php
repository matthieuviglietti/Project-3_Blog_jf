<?php

require_once('Controller/frontend/controller_frontend.php');
require_once('Controller/backend/controller_backend.php');

class Root
{

	private $_controlb;
	private $_controlf;

	public function __construct(){
		$this->_controlb = new Controlback();
		$this->_controlf = new Controlfront();
	}

	public function selectRoot() //function for index.php
	{
			try
			{
				if (isset($_GET['action']))
				{
					//*****************backoffice admin functions - secure roots*******************//


					//to create a new Episode (Post)

					if ($_GET['action'] == 'createp')
					{
						session_start();
							if (isset($_SESSION['name']) && isset($_SESSION['id']))
							{
								if (isset($_POST['title']) && isset($_POST['author']) && isset($_POST['content']) && isset($_POST['chapter']) && isset($_POST['postdate']))
								{
									if (ctype_digit($_POST['chapter']))
									{
											$postdateformat = date('Y-m-d H:i:s', strtotime($_POST['postdate']));
											$CreateP = $this->_controlb->CreatePost($_POST['title'], $_POST['chapter'], $_POST['author'], $_POST['content'], $postdateformat);
									}
									else{
										throw new Exception('<div class="exception">La mise à jour du post a échouée, le numéro d\'épisode n\'est pas un nombre entier</div>');
									}
								}
								else{
									throw new Exception('<div class="exception">L\'épisode n\'a pas pu être enregistré</div>');
								}
							}

							else{
								throw new Exception('<div class="exception">Cette page est en accès limité, merci de vous connecter </br><a href="index.php?action=gotologin">Se connecter</a></div>');
							}
					}

					//to Login View

					elseif ($_GET['action'] == 'gotologin')
					{
						session_start();
						if (isset($_SESSION['name']) && isset($_SESSION['id']))
						{
							$CreateP = $this->_controlb->Board();
						}
						else{
							$this->_controlb->LoginView();
						}
					}

					//Login check

					elseif ($_GET['action'] == 'login')
					{
						if (isset($_POST['pass']) && isset($_POST['name']))
						{
							$this->_controlb->LogIn($_POST['name'], $_POST['pass']);
						}

						else{
							throw new Exception('<div class="exception">Il manque le login ou le mot de passe</div>');
						}
					}

					//Login success go to action=board

					elseif ($_GET['action'] == 'logged')
					{
						session_start();
						if (isset($_SESSION['name']) && isset($_SESSION['id']))
						{
							$logged = $this->_controlb->Logged();
						}

						else{
							throw new Exception('<div class="exception">Cette page est en accès limité, merci de vous connecter </br> <a href="index.php?action=gotologin">Se connecter</a></div>');
						}
					}

					//Homepage Backoffice (Create a new post)

					elseif ($_GET['action'] == 'board')
					{
						session_start();
							if (isset($_SESSION['name']) && isset($_SESSION['id']))
							{
									$CreateP = $this->_controlb->Board();
							}
							else{
								throw new Exception('<div class="exception">Cette page est en accès limité, merci de vous connecter </br> <a href="index.php?action=gotologin">Se connecter</a></div>');
							}
					}

					//Logout function

					elseif ($_GET['action'] == 'logout')
					{
						$logout = $this->_controlb->LogOut();
					}

					//List posts backoffice

					elseif ($_GET['action'] == 'listp')
					{
						session_start();
						if (isset($_SESSION['name']) && isset($_SESSION['id']))
						{
							$ListP = $this->_controlb->ListPosts();
						}
						else{
								throw new Exception('<div class="exception">Cette page est en accès limité, merci de vous connecter </br> <a href="index.php?action=gotologin">Se connecter</a></div>');
						}
					}

					//list of alert comments

					elseif ($_GET['action'] == 'alertcb')
					{
						session_start();
						if (isset($_SESSION['name']) && isset($_SESSION['id']))
						{
							$AlertComments = $this->_controlb->AlertList();
						}
						else{
								throw new Exception('<div class="exception">Cette page est en accès limité, merci de vous connecter </br> <a href="index.php?action=gotologin">Se connecter</a></div>');
						}
					}

					//update Posts function

					elseif ($_GET['action'] == 'updatep')
					{
						session_start();
						if (isset($_SESSION['name']) && isset($_SESSION['id']))
						{
								if (isset($_POST['title']) &&isset($_POST['chapter']) && isset($_POST['content']) && isset($_GET['id']) && isset($_POST['postdate']))
							{
									if(ctype_digit($_POST['chapter']))
									{
											$postdateformat = date('Y-m-d H:i:s', strtotime($_POST['postdate']));
											$postdate=$_POST['postdate'];
											$UpdateP = $this->_controlb->updatePost($_POST['title'], $_POST['chapter'], $_POST['content'], $postdateformat, $_GET['id'], $postdate);
									}
									else{
										throw new Exception('<div class="exception">La mise à jour du post a échouée, le numéro d\'épisode n\'est pas un nombre entier</div>');
									}
							}
							else{
								throw new Exception('<div class="exception">La mise à jour du post a échouée, il manque soit le titre, soit le contenu, soit l\'identifiant du post</div>');
							}
						}
						else{
								throw new Exception('<div class="exception">Cette page est en accès limité, merci de vous connecter </br> <a href="index.php?action=gotologin">Se connecter</a></div>');
						}
					}

					//Update post view with form

					elseif ($_GET['action'] == 'updatepview')
					{
						session_start();
						if (isset($_SESSION['name']) && isset($_SESSION['id']))
						{
							if (isset($_GET['id']))
							{
								$UpdatePview = $this->_controlb->updatePostView($_GET['id']);
							}
							else{
								throw new Exception('<div class="exception">L\'affichage du post a échoué il manque son identifiant</div>');
							}
						}
						else{
								throw new Exception('<div class="exception">Cette page est en accès limité, merci de vous connecter </br> <a href="index.php?action=gotologin">Se connecter</a></div>');
						}
					}

					//Delete Posts

					elseif ($_GET['action'] == 'deletepconf')
					{
						session_start();
						if (isset($_SESSION['name']) && isset($_SESSION['id']))
						{
							if (isset($_GET['id']))
							{
								$Deleteconf = $this->_controlb->deletePostconf($_GET['id']);
							}
							else{
								throw new Exception('<div class="exception">L\'affichage du post a échoué il manque son identifiant</div>');
							}
						}
						else{
								throw new Exception('<div class="exception">Cette page est en accès limité, merci de vous connecter </br> <a href="index.php?action=gotologin">Se connecter</a></div>');
						}
					}

					elseif ($_GET['action'] == 'deletep')
					{
						session_start();
						if (isset($_SESSION['name']) && isset($_SESSION['id']))
						{
							if (isset($_GET['id']))
							{
								$DeleteP = $this->_controlb->deletePost($_GET['id']);
							}
							else{
								throw new Exception('<div class="exception">L\'identifiant du post est introuvable</div>');
							}
						}
						else{
								throw new Exception('<div class="exception">Cette page est en accès limité, merci de vous connecter </br> <a href="index.php?action=gotologin">Se connecter</a></div>');
						}
					}

					//backend update comment with delete phrase

					elseif ($_GET['action'] == 'deletec')
					{
						session_start();
						if (isset($_SESSION['name']) && isset($_SESSION['id']))
						{
							if (isset($_GET['commentid']))
							{
								$DeleteC = $this->_controlb->Updatecomment($_GET['commentid']);
							}
							else{
								throw new Exception('<div class="exception">L\'identifiant du commentaire est introuvable</div>');
							}
						}
						else{
								throw new Exception('<div class="exception">Cette page est en accès limité, merci de vous connecter </br> <a href="index.php?action=gotologin">Se connecter</a></div>');
						}
					}

					//backend Validate comment alert

					elseif ($_GET['action'] == 'validatec')
					{
						session_start();
						if (isset($_SESSION['name']) && isset($_SESSION['id']))
						{
							if (isset($_GET['commentid']))
							{
								$DeleteC = $this->_controlb->Validatecomment($_GET['commentid']);
							}
							else{
								throw new Exception('<div class="exception">L\'identifiant du commentaire est introuvable</div>');
							}
						}
						else{
								throw new Exception('<div class="exception">Cette page est en accès limité, merci de vous connecter </br> <a href="index.php?action=gotologin">Se connecter</a></div>');
						}
					}

					//*****************frontoffice user root and functions*******************//

					//List posts front - Homepage

					elseif ($_GET['action'] == 'listpfront')
					{
							$ListP = $this->_controlf->ListPosts();
					}

					//one Post and comments - Pagination

					elseif ($_GET['action'] == 'postfront')
					{
							if (isset($_GET['id']))
							{
								if(isset($_GET['page']) && intval($_GET['page']))
									{
										$page = intval($_GET['page']);
										$limit = 10;
										$start = ($_GET['page']-1)*$limit;
										$PostAndComments = $this->_controlf->Post($_GET['id'], $start, $limit, $page);
									}

								else{
									$page = 1;
									$limit = 10;
									$start = ($page-1)*$limit;
									$PostAndComments = $this->_controlf->Post($_GET['id'], $start, $limit, $page);
								}
							}

							else{
								throw new Exception('<div class="exception">l\'id du post n\'est pas trouvable</div>');
							}
					}

					//alert comment -- update function db

					elseif ($_GET['action'] == 'alertc')
					{
							if (isset($_GET['commentid']) && isset($_GET['id']))
							{
								$PostAndComments = $this->_controlf->Alert($_GET['commentid'], $_GET['id']);
							}

							else{
								throw new Exception('<div class="exception">le commentaire n\'a pas pu etre identifié</div>');
							}
					}

					//Create a new comment on post

					elseif ($_GET['action'] == 'createc')
					{
						if (isset($_GET['id']) && isset($_POST['author']) && isset($_POST['comment']))
						{
							if ($_POST['comment'] != NULL)
							{
								$CreateC = $this->_controlf-> CreateComment($_GET['id'], $_POST['author'], $_POST['comment']);
							}
							else{
								throw new Exception('<div class="exception">Le commentaire est vide</div>');
							}
						}
						else{
							throw new Exception('<div class="exception">La création du commentaire a échouée</div>');
						}
					}

					//Search bar

					elseif ($_GET['action'] == 'search')
					{
							if (isset($_GET['search']) && $_GET['search']!=NULL)
							{
								$Search = $this->_controlf->GetSearch($_GET['search']);
							}
							else{
								throw new Exception('<div class="exception">la recherche a échouée, Vous n\'avez pas spécifié de mot clé</div>');
							}
					}
				}

				//Defaut root Homepage user

				else{
					$this->_controlf->Listposts();
				}
			}

			catch (Exception $e)
			{
    			echo 'Erreur reçue : '. $e->getMessage();
			}
	}
}

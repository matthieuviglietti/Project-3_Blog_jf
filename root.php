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
	
	public function selectRoot()
	{
			try
			{
				
				if (isset($_GET['action']))
				{
					
				
					//backoffice 
					
					//Create a new Episode (Post)
				
					if ($_GET['action'] == 'createp') 
					{
						session_start();
							if (isset($_SESSION['name']) && isset($_SESSION['id']))
							{
								if (isset($_POST['title']) && isset($_POST['author']) && isset($_POST['content']) && isset($_POST['chapter']))
								{
									if(ctype_digit($_POST['chapter']))
									{
										$CreateP = $this->_controlb->CreatePost($_POST['title'], $_POST['chapter'], $_POST['author'], $_POST['content']);
									}
									else{
										throw new Exception('La mise à jour du post a échouée, le numéro d\'épisode n\'est pas un nombre entier');
									}	
								}
								else{
									throw new Exception('L\'épisode n\'a pas pu être enregistré');
								}
							}
						
							else{
								throw new Exception('Cette page est en accès limité, merci de vous connecter');
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
							throw new Exception('Il manque le login ou le mot de passe');
						}
					}
				
					elseif ($_GET['action'] == 'logged')
					{
						session_start();
						if (isset($_SESSION['name']) && isset($_SESSION['id']))
						{
							$logged = $this->_controlb->Logged();
						}
						
						else{
							throw new Exception('Cette page est en accès limité, merci de vous connecter');
						}
					}
					
					elseif ($_GET['action'] == 'logout')
					{
						$logout = $this->_controlb->LogOut();
					}
					
					elseif ($_GET['action'] == 'board')
					{
						session_start();
							if (isset($_SESSION['name']) && isset($_SESSION['id']))
							{
									$CreateP = $this->_controlb->Board();
							}
							else{
								throw new Exception('Cette page est en accès limité, merci de vous connecter');
							}
					}
					
					//List posts back
				
					elseif ($_GET['action'] == 'listp')
					{	
						session_start();
						if (isset($_SESSION['name']) && isset($_SESSION['id']))
						{
							$ListP = $this->_controlb->ListPosts();
						}
						else{
								throw new Exception('Cette page est en accès limité, merci de vous connecter');
						}
					}
				
					//List posts front
				
					elseif ($_GET['action'] == 'listpfront')
					{
							$ListP = $this->_controlf->ListPosts();
					}

					elseif ($_GET['action'] == 'post')
					{
						session_start();
						if (isset($_SESSION['name']) && isset($_SESSION['id']))
						{
								if (isset($_GET['postid']))
								{
										$PostAndComments = $this->_controlb->Post($_GET['id']);	
								}
								else{
								throw new Exception('l\'id du post n\'est pas trouvable');
								}
								
						}
						else{
								throw new Exception('Cette page est en accès limité, merci de vous connecter');
						}
							
					}
						
					
				
					//Post and comments front
					
					elseif ($_GET['action'] == 'search')
					{
							if (isset($_GET['search']) && $_GET['search']!=NULL)
							{
								$Search = $this->_controlf->GetSearch($_GET['search']);
							}
							else{
								throw new Exception('la recherche a échouée, Vous n\'avez pas spécifié de mot clé');
							}
					}
				
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
								throw new Exception('l\'id du post n\'est pas trouvable');
							}
					}
				
					//alert comment -- update db //Voir pour message alerte
					elseif ($_GET['action'] == 'alertc')
					{
							if (isset($_GET['commentid']) && isset($_GET['id']))
							{
								$PostAndComments = $this->_controlf->Alert($_GET['commentid'], $_GET['id']);	
							}

							else{
								throw new Exception('le commentaire n\'a pas pu etre identifié');
							}
					}
				
					//list of alert comment -- backend
					elseif ($_GET['action'] == 'alertcb')
					{
						session_start();
						if (isset($_SESSION['name']) && isset($_SESSION['id']))
						{
							$AlertComments = $this->_controlb->AlertList();	
						}
						else{
								throw new Exception('Cette page est en accès limité, merci de vous connecter');
						}
					}
				

					//update Posts
				
					elseif ($_GET['action'] == 'updatep')
					{
						session_start();
						if (isset($_SESSION['name']) && isset($_SESSION['id']))
						{
								if (isset($_POST['title']) &&isset($_POST['chapter']) && isset($_POST['content']) && isset($_GET['id']))
							{
									if(ctype_digit($_POST['chapter']))
									{
										$UpdateP = $this->_controlb->updatePost($_POST['title'], $_POST['chapter'], $_POST['content'], $_GET['id']);
									}
									else{
										throw new Exception('La mise à jour du post a échouée, le numéro d\'épisode n\'est pas un nombre entier');
									}		
							}
							else{
								throw new Exception('La mise à jour du post a échouée, il manque soit le titre, soit le contenu, soit l\'identifiant du post');
							}
						}
						else{
								throw new Exception('Cette page est en accès limité, merci de vous connecter');
						}
					}
					
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
								throw new Exception('L\'affichage du post a échoué il manque son identifiant');
							}
						}
						else{
								throw new Exception('Cette page est en accès limité, merci de vous connecter');
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
								throw new Exception('L\'affichage du post a échoué il manque son identifiant');
							}
						}
						else{
								throw new Exception('Cette page est en accès limité, merci de vous connecter');
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
								throw new Exception('L\'identifiant du post est introuvable');
							}
						}
						else{
								throw new Exception('Cette page est en accès limité, merci de vous connecter');
						}
					}

					elseif ($_GET['action'] == 'createc')
					{
						if (isset($_GET['id']) && isset($_POST['author']) && isset($_POST['comment'])) 
						{
								$CreateC = $this->_controlf-> CreateComment($_GET['id'], $_POST['author'], $_POST['comment']);
						}
						else{
							throw new Exception('La création du commentaire a échouée');
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
								throw new Exception('L\'identifiant du commentaire est introuvable');
							}
						}
						else{
								throw new Exception('Cette page est en accès limité, merci de vous connecter');
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
								throw new Exception('L\'identifiant du commentaire est introuvable');
							}
						}
						else{
								throw new Exception('Cette page est en accès limité, merci de vous connecter');
						}
					}
					
					
				}
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
//}

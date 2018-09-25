<?php

require_once('Controller/frontend/controller_frontend.php');
require_once('Controller/backend/controller_backend.php');

class Root
{
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
								if (isset($_POST['title']) && isset($_POST['author']) && isset($_POST['content']))
								{
									$controlb = new Controlback;
									$CreateP = $controlb->CreatePost($_POST['title'], $_POST['author'], $_POST['content']);
								}
								else{
									throw new Exception('L\'épisode n\'a pas pu être enregistré');
								}
							}
						
							else{
								throw new Exception('Cette page est en accès limité, merci de vous connecter');
							}
						
		
					}
				
					//Login check
				
					elseif ($_GET['action'] == 'login') 
					{
						if (isset($_POST['pass']) && isset($_POST['name']))
						{
							$controlb = new Controlback;
							$controlb->LogIn($_POST['name'], $_POST['pass']);
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
							$controlb = new Controlback;
							$logged = $controlb->Logged();
						}
						
						else{
							throw new Exception('Cette page est en accès limité, merci de vous connecter');
						}
					}
				
					elseif ($_GET['action'] == 'board')
					{
						session_start();
							if (isset($_SESSION['name']) && isset($_SESSION['id']))
							{
									$controlb = new Controlback;
									$CreateP = $controlb->Board();
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
							$controlb = new Controlback;
							$ListP = $controlb->ListPosts();
						}
						else{
								throw new Exception('Cette page est en accès limité, merci de vous connecter');
						}
					}
				
					//List posts front
				
					elseif ($_GET['action'] == 'listpfront')
					{
							$controlf = new Controlfront;
							$ListP = $controlf->ListPosts();
					}

					elseif ($_GET['action'] == 'post')
					{
						session_start();
						if (isset($_SESSION['name']) && isset($_SESSION['id']))
						{
								if (isset($_GET['postid']))
							{
								$controlb = new Controlback;
								$PostAndComments = $controlb->Post($_GET['id']);	
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
				
					elseif ($_GET['action'] == 'postfront')
					{
							if (isset($_GET['id']))
							{
								$controlf = new Controlfront;
								$PostAndComments = $controlf->Post($_GET['id']);	
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
								$controlf = new Controlfront;
								$PostAndComments = $controlf->Alert($_GET['commentid'], $_GET['id']);	
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
							$controlb = new Controlback;
							$AlertComments = $controlb->AlertList();	
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
								if (isset($_POST['title']) && isset($_POST['content']) && isset($_GET['id']))
							{
								$controlb = new Controlback;
								$UpdateP = $controlb->updatePost($_POST['title'], $_POST['content'], $_GET['id']);			
							}
							else{
								throw new Exception('La mise à jour du post a échouée, il manque soit le titre, soit le contenu, soit l\'identifiant du post');
							}
						}
						else{
								throw new Exception('Cette page est en accès limité, merci de vous connecter');
						}
					}

					//Delete Posts

					elseif ($_GET['action'] == 'deletep')
					{
						session_start();
						if (isset($_SESSION['name']) && isset($_SESSION['id']))
						{
							if (isset($_GET['id']))
							{
								$controlb = new Controlback;
								$DeleteP = $controlb->deletePost($_GET['id']);
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
								$controlf= new Controlfront;
								$CreateC = $controlf-> CreateComment($_GET['id'], $_POST['author'], $_POST['comment']);
						}
						else{
							throw new Exception('La création du commentaire a échouée');
						}
					}
				}
				else{
					$controlf =new Controlfront;
					$controlf->Listposts();
				}
			}
		
			catch (Exception $e) 
			{
    			echo 'Erreur reçue : '. $e->getMessage();	
			}
	}
}
//}

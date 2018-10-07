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
								if (isset($_POST['title']) && isset($_POST['author']) && isset($_POST['content']) && isset($_POST['chapter']))
								{
									if(ctype_digit($_POST['chapter']))
									{
										$controlb = new Controlback;
										$CreateP = $controlb->CreatePost($_POST['title'], $_POST['chapter'], $_POST['author'], $_POST['content']);
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
							$controlb = new Controlback;
							$CreateP = $controlb->Board();
						}
						else{
							$controlb = new Controlback;
							$controlb->LoginView();
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
					
					elseif ($_GET['action'] == 'logout')
					{
						$controlb = new Controlback;
						$logout = $controlb->LogOut();
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
					
					elseif ($_GET['action'] == 'search')
					{
							if (isset($_GET['search']) && $_GET['search']!=NULL)
							{
								$controlf = new Controlfront;
								$Search = $controlf->GetSearch($_GET['search']);
							}
							else{
								throw new Exception('la recherche a échouée, Vous n\'avez pas spécifié de mot clé');
							}
					}
				
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
								if (isset($_POST['title']) &&isset($_POST['chapter']) && isset($_POST['content']) && isset($_GET['id']))
							{
									if(ctype_digit($_POST['chapter']))
									{
										$controlb = new Controlback;
										$UpdateP = $controlb->updatePost($_POST['title'], $_POST['chapter'], $_POST['content'], $_GET['id']);
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
								$controlb = new Controlback;
								$UpdatePview = $controlb->updatePostView($_GET['id']);			
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
								$controlb = new Controlback;
								$Deleteconf = $controlb->deletePostconf($_GET['id']);
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
					
					//backend update comment with delete phrase
					
					elseif ($_GET['action'] == 'deletec')
					{
						session_start();
						if (isset($_SESSION['name']) && isset($_SESSION['id']))
						{
							if (isset($_GET['commentid']))
							{
								$controlb = new Controlback;
								$DeleteC = $controlb->Updatecomment($_GET['commentid']);
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
								$controlb = new Controlback;
								$DeleteC = $controlb->Validatecomment($_GET['commentid']);
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

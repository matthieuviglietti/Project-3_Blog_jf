<?php

class AdminManager extends Manager
{

	public function logIn($name, $pass)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, name, pass FROM admin WHERE name = :name');
		$req->execute(array
				('name' => $name));
		$resultat = $req->fetch();
		
		return $resultat;
	}
	
	public function logOut()
	{
	session_start();

	$_SESSION = array();
	session_destroy();
	}

}

<?php

class AdminManager extends Manager
{
	public function logIn($name, $pass, $pass_hash)
	{
		$name = $_POST['name'];
		$pass = $_POST['pass'];
		$pass_hash=password_hash($pass, PASSWORD_DEFAULT); // a définir dans le root

		if (isset($name) && isset($pass))
		{
			$Manager =new Manager; 
			$db = $Manager->dbConnect();
			$req = $db->prepare('SELECT id, name, pass FROM admin WHERE name = :name');
			$req->execute(array
				('name' => $name));
			$resultat = $req->fetch();


			$ispasswordCorrect = password_verify($pass, $resultsat['pass']);


			if (!$resultat)
			{

				echo 'le problème:'.$pseudo.'!';
			}
		}
	}
}
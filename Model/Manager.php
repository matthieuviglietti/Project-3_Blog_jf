<?php

class Manager
{
	protected function dbConnect()
	{
		$db = new PDO('mysql:host=localhost;dbname=blog_jf;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		
        return $db;
	}

}
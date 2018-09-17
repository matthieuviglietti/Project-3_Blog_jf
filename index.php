<?php

namespace MV\BLOG;

require_once('root.php');

class index
{
	public function Select ()
	{
		$root = new Root;
		$Select = $root->selectRoot();
	}
}
		
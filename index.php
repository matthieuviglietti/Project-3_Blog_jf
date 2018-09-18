<?php

namespace MV\Blog;

require_once('root.php');

class index
{
	public function Select()
	{
		$root = new MV\Blog\Root;
		$select = $root->selectRoot();
		
	}
}
		
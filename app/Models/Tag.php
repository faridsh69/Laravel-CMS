<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Conner\Tagging\Model\Tag as TagSpatie;

class Tag extends TagSpatie
{
	public function getColumns()
	{
		return [];
	}
}


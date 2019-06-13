<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Actuallymab\LaravelComment\Models\Comment as CommentSpatie;

class Comment extends CommentSpatie
{
    // we dont need this table for version
	public function getColumns()
	{
		return [];
	}
}

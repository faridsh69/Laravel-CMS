<?php

namespace App\Base;

use Illuminate\Database\Eloquent\Model;

class BaseDependency extends Model
{
    public $table = 'blogs';
    
    public function where($column, $id)
    {
        return \App\Models\Blog::first();
    }
}

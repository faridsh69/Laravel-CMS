<?php

namespace App\Base;

use Illuminate\Database\Eloquent\Model;

class BaseDependency extends Model
{
    public $table = 'blogs';
    
    // @todo fix this shite
    // public function where($column, $id)
    // {
    //     // dd($id);
    //     return \App\Models\Blog::first();
    // }
}

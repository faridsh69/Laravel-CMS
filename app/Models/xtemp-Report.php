<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    public $guarded = [];

    protected $hidden = [
        'deleted_at',
    ];

    public $columns = [
        
    ];

    public function getColumns()
    {
        return $this->columns;
    }
}

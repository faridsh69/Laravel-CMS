<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
	use SoftDeletes;

    public $guarded = [];

    protected $hidden = [
    	'created_at',
    	'deleted_at',
    	'updated_at',
    ];

    public $fillable = [
    	'id',
    	'title', 
    	'url', 
    	'short_content',
    	'content',
    	'creator_id',
    	'editor_id',
    	'seo_id',
    	'status',
    ];

    const STATUS_ACTIVE = 'active';
    const STATUS_DEACTIVE = 'deactive';

    public function scopeActive($query)
    {
        return $query->where('status', self::STATUS_ACTIVE);
    }

    public function scopeMine($query)
    {
        return $query->where('user_id', \Auth::id());
    }

    public static function getFillables()
    {
    	return (new self)->fillable;
    }

    public function editor()
    {
        return $this->belongsTo('App\Models\User', 'editor_id', 'id');
    }

    public function creator()
    {
        return $this->belongsTo('App\Models\User', 'creator_id', 'id');
    }
}

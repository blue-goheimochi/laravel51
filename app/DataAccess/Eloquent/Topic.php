<?php

namespace App\DataAccess\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'topics';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'title', 'body', 'status'];

    public function user()
    {
        return $this->belongsTo('\App\DataAccess\Eloquent\User');
    }
    
    public function comments()
    {
        return $this->hasMany('\App\DataAccess\Eloquent\Comment')->where('parent_comment_id', null);
    }
    
    public function likes()
    {
        return $this->hasMany('\App\DataAccess\Eloquent\Like');
    }
}

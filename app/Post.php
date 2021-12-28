<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id','category','post_title','post_body','post_image'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes', 'post_id', 'user_id')->withTimestamps();
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

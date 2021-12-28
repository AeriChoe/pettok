<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'provider_id',
        'user_name',
        'gender',
        'month',
        'day',
        'pet',
        'relationship',
        'description',
        'profile_pic',
        'cover_pic',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function followings()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'follow_id')->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'follow_id', 'user_id')->withTimestamps();
    }

    public function follow($userId)
    {
        $exist = $this->is_following($userId);
        $its_me = $this->id == $userId;
    
        if ($exist || $its_me) {
            return false;
        } else {
            $this->followings()->attach($userId);
            return true;
        }
    }
    
    public function unfollow($userId)
    {
        $exist = $this->is_following($userId);
        $its_me = $this->id == $userId;
    
        if ($exist && !$its_me) {
            $this->followings()->detach($userId);
            return true;
        } else {
            return false;
        }
    }
    
    public function is_following($userId)
    {
        return $this->followings()->where('follow_id', $userId)->exists();
    }
    
    public function likes()
    {
        return $this->belongsToMany(Post::class, 'likes', 'user_id', 'post_id')->withTimestamps();
    }
    
    public function like($postId)
    {
        $exist = $this->is_like($postId);
        
        if ($exist) {
            return false;
        } else {
            $this->likes()->attach($postId);
            return true;
        }
    }
    
    public function unlike($postId)
    {
        $exist = $this->is_like($postId);
        
        if ($exist) {
            $this->likes()->detach($postId);
            return true;
        } else {
            return false;
        }
    }
    
    public function is_like($postId)
    {
        return $this->likes()->where('post_id', $postId)->exists();
    }

    
}

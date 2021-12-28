<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        $posts = Post::where('user_id', $id)->orderBy('created_at', 'desc')->get();
        $followers = $user->followers()->paginate(10);
        $followings = $user->followings()->paginate(10);

        $data = [
            'user' => $user,
            'posts' => $posts,
            'followings' => $followings,
            'followers' => $followers,
        ];

        return view('users.show', $data);
    }
    
}

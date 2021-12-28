<?php

namespace App\Http\Controllers;

use Auth;
use Storage;
use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

class ProfileController extends Controller
{
    public function index()
    {   
        $id = Auth::user()->id;
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
        
        return view('profile.profile', $data);
    }
    
    public function edit($id)
    {   
        $user = User::find($id);
        
        if (Auth::id() === $user->id) {
            $login_user = Auth::user();
            
            return view('profile.editpro', [
					'user' => $login_user,
				]);
        }
        
        return redirect('/');
    }
    
    public function update(Request $request, $id)
    {   
        $user = User::find($id);
        $file_check = $request->file('profile_pic');
        
        $this->validate($request, [
            'user_name' => 'nullable|max:25',
            'description' => 'nullable|max:150',
            'gender' => 'nullable',
            'month' => 'nullable',
            'day' => 'nullable',
            'pet' => 'nullable|max:100',
            'relationship' => 'nullable|max:50',
            'profile_pic' => 'nullable|max:2048',   
        ]);
  
        if($file_check != '') {
            $image = $request->file('profile_pic');
            $path = Storage::disk('s3')->putFile('/pettok/profiles', $image, 'public');
            $file_url = Storage::disk('s3')->url($path);
        } else {
            $file_url = Auth::user()->profile_pic;
        }
        
        $user->update([
            'user_name' => $request->user_name,
            'description' => $request->description,
            'gender' => $request->gender,
            'month' => $request->month,
            'day' => $request->day,
            'pet' => $request->pet,
            'relationship' => $request->relationship,
            'profile_pic' => $file_url,
        ]); 
        
        return redirect('/profile');
        
    }

}

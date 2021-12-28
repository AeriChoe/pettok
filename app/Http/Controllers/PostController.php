<?php

namespace App\Http\Controllers;

use Auth;
use Storage;
use App\Post;
use App\User;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

class PostController extends Controller
{
    public function index()
    {
        $data = [];
        if (Auth::check()) {
            $posts = Post::where(function($query){
                $query->orWhere('category', '=', 'Pets')
                      ->orWhere('category', '=', 'Free');
            })->orderBy('created_at', 'desc')->get();
            $news_posts = Post::where('category', 'News')->paginate(3);
            
            $data = [
                'posts' => $posts,
                'news_posts' => $news_posts,
            ];

        }
        return view('welcome', $data);
    }
    
    public function create()
    {
        $post = new Post;
        
        return view('posts.create', [
           'post' => $post, 
        ]);
    }
    
    public function store(Request $request)
    {
        //dd($request->all());
        //dd($request->file('post_image'));
        $this->validate($request, [
            'category' => 'required',
            'post_title' => 'required|max:50',
            'post_body' => 'required',
            'post_image' => 'required|max:2048',
            
        ]);
        
        /*
        if(Input::hasFile('post_image')) {
            $file = Input::file('post_image');
            $imageName = str_shuffle($request->file('post_image')->getClientOriginalName()). '.' . $request->file('post_image')->getClientOriginalExtension();
            $file->move(public_path(). '/posts_img', $imageName);
            $file_url = '/posts_img/'. $imageName;
        }*/
        
        if(Input::hasFile('post_image')) {
            $image = $request->file('post_image');
            $path = Storage::disk('s3')->putFile('/pettok/posts', $image, 'public');
            $file_url = Storage::disk('s3')->url($path);
        }
        
        $request->user()->posts()->create([
            'category' => $request->category,
            'post_title' => $request->post_title,
            'post_body' => $request->post_body,
            'post_image' => $file_url,
            
        ]);
        
        return redirect('/'); 
    }
    
    public function show($id)
    {
        $post = Post::find($id);
        $post_date = date('j M Y, G:i', strtotime($post->created_at));
        $comments = Comment::where(['post_id' => $id])->get();
        
        return view('posts.show', [
            'post' => $post,
            'post_date' => $post_date,
            'comments' => $comments,
        ]);
    }
    
    public function destroy($id)
    {
        $post = Post::find($id);
        
        if(Auth::id() === $post->user_id) {
            $post->delete();
        }
        
        return redirect('/');
        
    }
    
    public function showcollection($category)
    {
        $posts = Post::where('category', $category)->orderBy('created_at', 'desc')->get();
            
        return view('posts.showcollection', [
            'posts' => $posts,
            'category' => $category,
        ]);
    }
    
    public function search(Request $request) {
        
        $keyword = $request->input('keyword');
        $posts = Post::where('post_title', 'LIKE', '%'.$keyword.'%')->orWhere('post_body', 'LIKE', '%'.$keyword.'%')->get();
    
        return view('posts.search', [
            'keyword' => $keyword,
            'posts' => $posts,
        ]);
    }
}

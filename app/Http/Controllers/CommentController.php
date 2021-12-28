<?php

namespace App\Http\Controllers;

use Auth;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $post_id)
    {
        //Auth::user()->comment($post_id);
        
        $this->validate($request, [
            'comment' => 'required|max:191',
        ]);
        
        Comment::create([
            'user_id' => $request->user()->id,
            'post_id' => $post_id,
            'comment' => $request->comment,
        ]);
        
        return back();
    }
    
    public function destroy($id)
    {
        $comment = Comment::find($id);
        
        if(Auth::id() === $comment->user_id) {
            $comment->delete();
        }
        
        return back();
    }
}

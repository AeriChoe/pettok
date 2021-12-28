<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request, $post_id)
    {
        Auth::user()->like($post_id);
        return back();
    }
    
    public function destroy($post_id)
    {
        Auth::user()->unlike($post_id);
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function showPost($id)
    {
        $post = Post::findOrFail($id);

        $comments = $post->comments()->where('is_approved', true)->get();

        return view('post.show', compact('post', 'comments'));
    }

}

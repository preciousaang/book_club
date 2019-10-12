<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{    
    public function edit(Request $request){
        $post = Post::findOrFail($request->id);
        $this->authorize('update', $post);
        return view('posts.edit', [
            'post'=>$post,
        ]);
    }

    public function update(Request $request){
        $post = Post::findOrFail($request->id);
        $this->authorize('update', $post);
        $request->validate([
            'body'=>'required'
        ]);
        $post->content = $request->input('body');
        $post->save();
        return redirect()->back()->with('success', 'Post Updated Successfully');
    }
}

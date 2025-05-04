<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        // Assuming you have a Post model set up
        // $post = new Post();
        // $post->title = $incomingFields['title'];
        // $post->body = $incomingFields['body'];
        // $post->save();

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();
        Post::create($incomingFields);
        return redirect('/');

    }
}

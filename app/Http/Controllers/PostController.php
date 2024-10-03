<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Website;

class PostController extends Controller
{
    public function store(PostRequest $request, $website_id)
    {
        $website = Website::findOrFail($website_id);

        $post = Post::create([
            'website_id' => $website->id,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return response()->json(['message' => 'Post created successfully!', 'post' => $post], 201);
    }
}

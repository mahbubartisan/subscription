<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request, $website_id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $website = Website::findOrFail($website_id);

        $post = Post::create([
            'website_id' => $website->id,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return response()->json(['message' => 'Post created successfully!', 'post' => $post], 201);
    }
}

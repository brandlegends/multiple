<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'site_id' => 'required|exists:sites,id',
            'title' => 'required|string',
            'content' => 'required|string',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'Author_name' => 'nullable|string',
            'Author_email' => 'nullable|email',
            'Author_image' => 'nullable|string',
            'category_name' => 'nullable|string',
        ]);

        // Create a new post
        $post = Post::create([
            'site_id' => $request->site_id,
            'title' => $request->title,
            'content' => $request->content,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'Author_name' => $request->Author_name,
            'Author_email' => $request->Author_email,
            'Author_image' => $request->Author_image,
            'category_name' => $request->category_name,
        ]);

        // Return a response with the newly created post
        return response()->json(['message' => 'Post created successfully', 'post' => $post], 201);
    }
}

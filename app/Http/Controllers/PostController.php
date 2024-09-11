<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'domain' => 'required|exists:sites,domain',
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        // Find the site by domain
        $site = Site::where('domain', $request->domain)->firstOrFail();

        // Create a new post for the site
        $post = new Post([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        $site->posts()->save($post);

        return response()->json(['message' => 'Post created successfully'], 201);
    }
}

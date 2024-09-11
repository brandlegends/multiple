<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
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
            'slug' => 'required|string|unique:pages',
            'parent_id' => 'nullable|exists:pages,id',
            'Author_name' => 'nullable|string',
            'Author_email' => 'nullable|email',
            'Author_image' => 'nullable|string',
            'category_name' => 'nullable|string',
        ]);

        // Create a new page
        $page = Page::create([
            'site_id' => $request->site_id,
            'title' => $request->title,
            'content' => $request->content,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'slug' => $request->slug,
            'parent_id' => $request->parent_id,
            'Author_name' => $request->Author_name,
            'Author_email' => $request->Author_email,
            'Author_image' => $request->Author_image,
            'category_name' => $request->category_name,
        ]);

        // Return a response with the newly created page
        return response()->json(['message' => 'Page created successfully', 'page' => $page], 201);
    }
}

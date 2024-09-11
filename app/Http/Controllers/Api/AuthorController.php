<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:authors',
        ]);

        $author = Author::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return response()->json(['message' => 'Author created successfully', 'author' => $author], 201);
    }
}

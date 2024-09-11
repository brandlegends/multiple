<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'domain' => 'required|string|unique:sites',
        ]);

        $site = Site::create([
            'domain' => $request->domain,
        ]);

        return response()->json(['message' => 'Site created successfully', 'site' => $site], 201);
    }
}

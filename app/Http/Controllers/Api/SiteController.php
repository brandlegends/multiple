<?php

namespace App\Http\Controllers\Api;

use App\Models\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

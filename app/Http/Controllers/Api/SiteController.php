<?php

namespace App\Http\Controllers\Api;

use App\Models\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{

    // Method to fetch all sites
    public function index()
    {
        // Retrieve all sites and return them as JSON
        $sites = Site::all();
        return response()->json($sites);
    }
    
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

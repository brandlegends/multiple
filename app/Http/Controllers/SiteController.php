<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function show(Request $request)
    {
        $domain = $request->getHost();
        
        // Find the site by domain
        $site = Site::where('domain', $domain)->firstOrFail();

        // Load all posts related to this site
        $posts = $site->posts;

        // Return the view with the site's posts
        return view('site.show', compact('site', 'posts'));
    }
}

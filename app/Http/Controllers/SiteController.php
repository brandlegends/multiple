<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function show(Request $request)
    {
        $domain = $request->getHost();
        $site = Site::where('domain', $domain)->firstOrFail();

        $pathSegments = $request->segments(); // Get path like ['cars', 'mazda']

        $page = $this->findPageBySlug($site, $pathSegments);

        if (!$page) {
            return abort(404, 'Page not found');
        }

        return view('site.show', compact('site', 'page'));
    }

    private function findPageBySlug($site, $segments)
    {
        $page = null;

        foreach ($segments as $slug) {
            if (!$page) {
                // First level: Look for a top-level page
                $page = Page::where('site_id', $site->id)->where('slug', $slug)->whereNull('parent_id')->first();
            } else {
                // Subsequent levels: Look for a child page
                $page = Page::where('site_id', $site->id)->where('slug', $slug)->where('parent_id', $page->id)->first();
            }

            if (!$page) {
                return null; // No page found for the given slug
            }
        }

        return $page;
    }
}

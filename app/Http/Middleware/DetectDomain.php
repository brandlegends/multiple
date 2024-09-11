<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Site;

class DetectDomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Get the domain from the request
        $domain = $request->getHost();

        // Check if the domain exists in the `sites` table
        $site = Site::where('domain', $domain)->first();

        if (!$site) {
            // If the domain is not registered, abort with a 404 error
            return abort(404, 'Site not found');
        }

        // Attach the site object to the request for future access
        $request->merge(['site' => $site]);

        return $next($request);
    }
}

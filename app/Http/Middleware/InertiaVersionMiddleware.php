<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Inertia\Inertia;

class InertiaVersionMiddleware
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
        if(File::exists($mixManifestFile = public_path('mix-manifest.json'))) {
            Inertia::version(function () use ($mixManifestFile) {
                return md5_file($mixManifestFile);
            });
        }

        return $next($request);
    }
}

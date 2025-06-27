<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMaintenanceMode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
    	if(isMaintenance() && isMaintenancePage($request->path())) {
    		return redirect()->route('maintenance');
    	} else {
    		if(!isMaintenance() && strpos($request->path(), 'maintenance') !== false) {
    			return redirect()->to('/');
    		}
    	}
        return $next($request);
    }
}

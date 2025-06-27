<?php
namespace App\Http\Middleware;
use Auth;
use Closure;
class AdminAuth
{
    public function handle($request, Closure $next)
    {
         if ($request->session()->has('ADMIN_USER')) {
            return $next($request);
        } else {
            return redirect()->route('admin.login');
        }
    }
}
<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;


class Localization
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
    	if (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        } else {
        	if(\Auth::check()) {
	    		App::setLocale(\Auth::user()->lang);
	    		Session::put('locale', \Auth::user()->lang);
	    	} else {
	    		App::setLocale('en');
	    		Session::put('locale', 'en');
	    	}
	    	
        }
        
        return $next($request);
    }
}
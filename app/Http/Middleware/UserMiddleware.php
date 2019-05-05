<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
         if(Auth::check()){
             Session::forget('property.url');
           
             return $next($request);
         }else{

         	  $book =  $request->isbook;
             return redirect()->route('login')->with(['isbook' => $book]);

         	//return response()->json($request);
         }
    }
}

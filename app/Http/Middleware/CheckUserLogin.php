<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckUserLogin
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
       $remember =  $request->cookie('remember');
       if ($remember) {
           $user_remember =  DB::table('users')->where('remember_token' , '=' , $remember);
           if (isset($user_remember->id) && ($user_remember->id >0)){
               return  $next($request);

           }
       }
       $session_user = session('user-login' , false);
       if (!$session_user) {
           return  redirect()->route("login") ;
       }
       return $next($request);
    }
}

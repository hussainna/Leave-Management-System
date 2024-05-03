<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ActiveMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()&&DB::table('users')->where('id',Auth::id())->where('is_active',1)->first())
        {
            return $next($request);

        }
        else if(Auth::check()&&DB::table('users')->where('id',Auth::id())->where('is_active',0)->first())
        {
            return response()->view('errors.wait');
        }
        else
        {
            return redirect('/login');
        }
    }
}

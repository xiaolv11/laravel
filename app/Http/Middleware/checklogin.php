<?php

namespace App\Http\Middleware;

use Closure;

class checklogin
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
        if(!Session()->has('admin_login')){
            return redirect()->route('admin.public.login')->withErrors("请先登录");
        }
        return $next($request);
    }
}

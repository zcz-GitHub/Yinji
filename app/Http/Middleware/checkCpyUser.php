<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;

class checkCpyUser
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
        if(!isset($_SESSION)){
            session_start();
        }
        if (!isset($_SESSION['privilege'])){
            return response('对不起，请先<a href="/login">登录</a>再访问本网页。', 401);
        }
        if (!($_SESSION['privilege'] == "staff" ||  $_SESSION['privilege'] == "admin")){
            return response('对不起，请您不是公司用户，无法访问公司页面。', 401);
        }
        
        return $next($request);
    }
}

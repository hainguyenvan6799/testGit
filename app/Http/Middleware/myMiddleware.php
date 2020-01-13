<?php

namespace App\Http\Middleware;

use Closure;

class myMiddleware
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
        if($request->has('txtdiem') && $request['txtdiem']>= 5)
        {
            return $next($request);
        }
        else
        {
            return redirect()->route('loi');
        }
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class NavigationFilter {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        $data = false;
        if ($data) {
            return $next($request);
        }

        return redirect('/');
    }

}

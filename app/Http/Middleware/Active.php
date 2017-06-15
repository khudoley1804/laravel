<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Support\Facades\Auth;
use Cache;

class Active
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
        $time = Carbon::now();
        //var_dump($time);
        $user = [
            'id' => auth()->user()->id,
            'ip' => $request->ip(),
            'time' => $time
        ];
        $cacheKey = auth()->user()->getCacheKey();
        //var_dump($cacheKey);
        //var_dump($user);
        Cache::put($cacheKey, $user, 1000);
        //var_dump(Cache::get('users#4'));
        return $next($request);
    }
}

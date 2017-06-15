<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Support\Facades\Auth;
use Cache;

class Visits
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
        $path = $request->path();
        $statistic = Cache::get('statistic');
        if(!array_key_exists($path, $statistic)) {
            $statistic [$path] = 1;
            Cache::put("statistic", $statistic, 1000);
        } else {
            $count = $statistic[$path];
            $count++;
            $statistic[$path] = $count;
            Cache::put("statistic", $statistic, 1000);
            //$value = Cache::get('statistic');
            //dd($value);
        }
        return $next($request);
    }
}

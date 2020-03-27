<?php

namespace App\Http\Middleware;

use App\Services\Utility\MyLogger2;
use Illuminate\Support\Facades\Cache;
use Closure;

class MyTestMiddleware
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
        
        MyLogger2::info("Entering My Test Middleware in handle()");
        
        if($request->username != null)
        {
            $value = Cache::store("file")->get("mydata");
            if($value == null) 
            {
                MyLogger2::info("Caching first time Username for " . $request->username);
                Cache::store("file")->put("mydata", $request->username, 1);
            }
        }
        else {
            $value = Cache::store("file")->get("mydata");
            if($value != null)
            {
                MyLogger2::info("Getting Username from Cache " . $value);
                
            } else 
            {
                MyLogger2::info("Could not get Username from Cache (data is older than 1 minute)");
            }
        }
        
        
        
        
        return $next($request);
    }
}

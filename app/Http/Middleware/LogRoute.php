<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogRoute
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
        $responce=$next($request);
        if(app()->environment('local')){
            $log=[
                'URL'=>$request->getUri(),
                'METHOD'=>$request->getMethod(),
                'REQUEST_BODY'=>$request->all(),
                'RESPONCE'=>$request->getContent()

            ];
            Log::info(json_encode($log));

        }
        return $responce;
    }
}

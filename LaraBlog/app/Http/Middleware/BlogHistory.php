<?php

namespace App\Http\Middleware;

use App\Models\History;
use Closure;
use Illuminate\Http\Request;

class BlogHistory
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
        $history = new History;

        if(History::count() >= 500){
            History::limit(1)->delete();
        }
        
            $history->URL = $request->url();
            $history->IP = $request->ip();
            $history->save();
        

        return $next($request);
    }
}

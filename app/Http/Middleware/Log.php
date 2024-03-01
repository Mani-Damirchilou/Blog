<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Log
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user())
        {
            \App\Models\Log::create([
                'text' => "کاربر با شناسه {$request->user()->id} از مسیر {$request->getUri()} دیدن کرد"
            ]);
        }
        return $next($request);
    }
}

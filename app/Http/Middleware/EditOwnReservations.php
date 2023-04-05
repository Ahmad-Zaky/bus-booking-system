<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EditOwnReservations
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (
            app("user") && $request->reservation &&
            app("user")->id !== $request->reservation->user_id
        ) {
            return response()->json([
                "message" => __("This reservation doen't belongs to you.")
            ], Response::HTTP_UNAUTHORIZED);
        }
 
        return $next($request);
    }
}

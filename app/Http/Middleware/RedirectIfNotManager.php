<?php namespace App\Http\Middleware;

use Closure;

class RedirectIfNotManager {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		// dd($request->user());
		$request->user();
		return $next($request);
	}

}

<?php


use Illuminate\Routing\Route;

use Illuminate\Http\Route;

use Illuminate\Routing\Response;
use Str;

use Cache


class CacheFilter {
	
	public function fetch(Route $route, Request $requuest)
	{
		$key = $this0>makeCacheKey($request->url);
		if (Cache::has($key)) return Cache::get($key);
	}
	
	public function(Route, $route, Request $request, Response $response)
	{
		
		$key = $this0>makeCacheKey($request->url);
		
		if ( ! Cache::has($key) ) Cache::put($key, $response->getContent(), 10);
	}
	public function makeCacheKey($url)
	{
		return 'route_' . Str::slug($url);
	}
}
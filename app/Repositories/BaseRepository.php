<?php
namespace App\Repositories;

use App\Exceptions\InvalidFilterException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class BaseRepository {

	//List of available filters
	protected $availabelFilterFields = [];

	//List of available sort filters
	protected $availabelSortFields = [];

	//cahcing query time in minutes
	protected $cacheTime = 30;

	/**
	 * 
	 * @param  [Eloquent Builder Object] $query
	 * @param  [Array] $filters
	 * @return [None]
	 */
	public function applyFilters($query, $filters){
		if (isset($filters['sort'])) {
			unset($filters['sort']);
		}
		foreach ($filters as $key => $value) {
			if ( !in_array($key, $this->availabelFilterFields) ) {
				throw new InvalidFilterException( 'Invalid filters in request - ' . implode(',',array_diff(array_keys($filters), $this->availabelFilterFields)) );
			}
			$methodName = 'filterBy' . ucfirst(camel_case($key));
			if (method_exists($this, $methodName)) {
				$this->$methodName($query, $value);
			}
		}
	}	

	/**
	 * 
	 * @param  [Eloquent Builder Object] $query
	 * @param  [Array] $sort
	 * @return [None]
	 */
	public function applySort($query, $sort){
		if (!in_array($sort, $this->availabelSortFields)) {
			throw new InvalidFilterException( 'Invalid sort field in request - ' . $sort );
		}
		$methodName = 'sortBy' . ucfirst(camel_case($sort));
		if (method_exists($this, $methodName)) {
			$this->$methodName($query);
		}
	}

	/**
	 * Check if the request is cached or not
	 * @param  Request $request 
	 * @return boolean
	 */
	public function isCached( Request $request ){
		$key = $this->generateKeyFromUrl($request);
		return Cache::has($key);
	}

	/**
	 * Returns cached entry if its already cacched other wise false
	 * @param  Request $request 
	 * @return Mixed
	 */
	public function getCache( Request $request ){
		$key = $this->generateKeyFromUrl($request);
		return Cache::get($key);
	}

	/**
	 * Save the data in cache
	 * @param  Request $request
	 * @param  [type]  $data    [description]
	 */
	public function putCache( Request $request, $data){
		$key = $this->generateKeyFromUrl($request);
		Cache::put($key, $data, $this->cacheTime);
	}

	public function generateKeyFromUrl(Request $request){
		$url = $request->url();
		$queryParams = request()->query();
		ksort($queryParams);
		$queryString = http_build_query($queryParams);
		$fullUrl = "{$url}?{$queryString}";
		$key = sha1($fullUrl);
		#$key = $fullUrl;
		return $key;
	}
}
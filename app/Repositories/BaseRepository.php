<?php
namespace App\Repositories;

use App\Exceptions\InvalidFilterException;

class BaseRepository {

	//List of available filters
	protected $availabelFilterFields = [];

	//List of available sort filters
	protected $availabelSortFields = [];

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
}
<?php
namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends BaseRepository{

	//primary model for this controller
	protected $model;

	//@override - List of available filters for product api. Anything outside this is invalid filter
	protected $availabelFilterFields = [
		'price_min', 
		'price_max', 
		'color', 
		'category'
	];

	//@override - List of available sort values for product api. Anything outside this is invalid filter
	protected $availabelSortFields = [
		'price_asc', 
		'price_desc', 
		'latest' 
	];

	public function __construct(Product $product){
		$this->model = $product;
	}

    /**
     * Paginate products and apply filters if any present in request
     *
     * @param  Array $params
     * @return Laravel Collection Object
     */
	public function all($params = array() ){
		if ( isset($params) && !empty($params)) {
			//If there are filter parameters present
			//Create builder object for the model
			$query = $this->model->query();

			$this->applyFilters($query, $params);

			//If sort parameters are present in the request
			//then apply sort 
			if ( isset($params['sort']) ) {
				$this->applySort($query, $params['sort']);
			}
			return $query->paginate(15);
		}
		else{
			return $this->model->paginate(15);
		}
	}
// Filters

	public function filterByPriceMin($query, $value){
		return $query->where('price', '>=', $value);
	}

	public function filterByPriceMax($query, $value){
		return $query->where('price', '<=', $value);
	}

	public function filterByColor($query, $value){
		$colors = explode(',', $value);
		return $query->whereIn('color', $colors);
	}

	public function filterByCategory($query, $value){
		$categories = explode(',', $value);
		return $query->whereIn('product_type', $categories);
	}

// Sort

	public function sortByPriceAsc($query){
		return $query->orderBy('price');
	}

	public function sortByPriceDesc($query){
		return $query->orderBy('price', 'desc');
	}

	public function sortByLatest($query){
		return $query->orderBy('created_at');
	}	
}
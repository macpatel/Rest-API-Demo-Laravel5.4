<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Transformers\ProductTransformer;
use League\Fractal\Manager;

class ProductController extends Controller
{

	public function __construct(ProductRepository $repo,
								Manager $fractal, 
								ProductTransformer $productTransformer){
		$this->repo = $repo;
		$this->fractal = $fractal;
        $this->transformer = $productTransformer;
	}

    public function index(Request $request){
    	$paginator = $this->repo->all($request);
    	return response()->json($this->paginateCollection($paginator), 200);
    }
}

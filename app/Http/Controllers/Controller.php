<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use League\Fractal\Resource\Collection;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $repo;
    protected $fractal;
    protected $transformer;

    public function paginateCollection($paginator){

    	$collection = $paginator->getCollection();
        $collection = new Collection($collection, $this->transformer);
        $collection->setPaginator(new IlluminatePaginatorAdapter($paginator));
        $collection = $this->fractal->createData($collection);

        return $collection->toArray();
    }
}

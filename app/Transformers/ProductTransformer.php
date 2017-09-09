<?php
namespace App\Transformers;

use App\Models\Product;
use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
{

    public function transform(Product $product)
    {
        return [
			'id' => $product->id,
			'sku' => $product->sku,
			'name' => $product->name,
			'price' => (float) $product->price,
			'color' => $product->color,
			'category' => $product->product_type,
			'image' => $product->product_image,
        ];
    }
}
<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
        	[
            'sku' => 'N01P2001',
            'name' => 'Cursive English Pendant',
            'price' => 1300,
            'color' => 'Gold',
            'product_type' => 'Personalized Jewelry',
            'product_image' => '//d1jbf5z8givhnm.cloudfront.net/media/catalog/product/b/l/block_letter_pendant_.jpg',
        	],
        	[
            'sku' => 'N01P2002',
            'name' => 'Block Letter Pendant',
            'price' => 1300,
            'color' => 'Gold',
            'product_type' => 'Personalized Jewelry',
            'product_image' => '//d1jbf5z8givhnm.cloudfront.net/media/catalog/product/b/l/block_letter_pendant_.jpg',
        	],
        	[
            'sku' => 'N01P2003',
            'name' => 'Block Letter Pendant',
            'price' => 1300,
            'color' => 'Gold',
            'product_type' => 'Personalized Jewelry',
            'product_image' => '//d1jbf5z8givhnm.cloudfront.net/media/catalog/product/b/l/block_letter_pendant_.jpg',
        	],
        	[
            'sku' => 'N01P2004',
            'name' => 'Block Letter Pendant',
            'price' => 1300,
            'color' => 'Gold',
            'product_type' => 'Personalized Jewelry',
            'product_image' => '//d1jbf5z8givhnm.cloudfront.net/media/catalog/product/b/l/block_letter_pendant_.jpg',
        	],
        	[
            'sku' => 'N01P2005',
            'name' => 'Block Letter Pendant',
            'price' => 1300,
            'color' => 'Gold',
            'product_type' => 'Personalized Jewelry',
            'product_image' => '//d1jbf5z8givhnm.cloudfront.net/media/catalog/product/b/l/block_letter_pendant_.jpg',
        	],
        	[
            'sku' => 'N01P2006',
            'name' => 'Block Letter Pendant',
            'price' => 1300,
            'color' => 'Gold',
            'product_type' => 'Personalized Jewelry',
            'product_image' => '//d1jbf5z8givhnm.cloudfront.net/media/catalog/product/b/l/block_letter_pendant_.jpg',
        	],
        	[
            'sku' => 'N01P2007',
            'name' => 'Block Letter Pendant',
            'price' => 1300,
            'color' => 'Gold',
            'product_type' => 'Personalized Jewelry',
            'product_image' => '//d1jbf5z8givhnm.cloudfront.net/media/catalog/product/b/l/block_letter_pendant_.jpg',
        	],
        	[
            'sku' => 'N01P2008',
            'name' => 'Block Letter Pendant',
            'price' => 1300,
            'color' => 'Gold',
            'product_type' => 'Personalized Jewelry',
            'product_image' => '//d1jbf5z8givhnm.cloudfront.net/media/catalog/product/b/l/block_letter_pendant_.jpg',
        	],
        	[
            'sku' => 'N01P2008',
            'name' => 'Block Letter Pendant',
            'price' => 1300,
            'color' => 'Gold',
            'product_type' => 'Personalized Jewelry',
            'product_image' => '//d1jbf5z8givhnm.cloudfront.net/media/catalog/product/b/l/block_letter_pendant_.jpg',
        	],
        	[
            'sku' => 'N01P2010',
            'name' => 'Block Letter Pendant',
            'price' => 1300,
            'color' => 'Gold',
            'product_type' => 'Personalized Jewelry',
            'product_image' => '//d1jbf5z8givhnm.cloudfront.net/media/catalog/product/b/l/block_letter_pendant_.jpg',
        	],
        	[
            'sku' => 'N01P2011',
            'name' => 'Block Letter Pendant',
            'price' => 1300,
            'color' => 'Gold',
            'product_type' => 'Personalized Jewelry',
            'product_image' => '//d1jbf5z8givhnm.cloudfront.net/media/catalog/product/b/l/block_letter_pendant_.jpg',
        	],        	        	        	
        ]);
    }
}

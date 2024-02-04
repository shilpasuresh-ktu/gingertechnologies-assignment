<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $categories = ['Electronics', 'Furniture', 'Clothing'];
      
      foreach($categories as $name) {
        Category::create([
          'name' => $name
        ]);
      }
    
      $products = [
        [
          'name' => 'iPhone 15',
          'category_id' => 1,
          'description' => '6.1-inch display', 
          'image' => 'https://cdn.shopify.com/s/files/1/0533/2089/files/placeholder-images-image_large.png?format=jpg&quality=90&v=1530129081' 
        ],
        [
          'name' => 'LG TV',
          'category_id' => 1,
          'description' => '55-inch 4K TV',
          'image' => 'https://cdn.shopify.com/s/files/1/0533/2089/files/placeholder-images-image_large.png?format=jpg&quality=90&v=1530129081'
        ],
        [
          'name' => 'Leather Sofa',
          'category_id' => 2,
          'description' => '3-seater brown leather sofa',
          'image' => 'https://cdn.shopify.com/s/files/1/0533/2089/files/placeholder-images-image_large.png?format=jpg&quality=90&v=1530129081'
        ]
      ];
    
      foreach($products as $product) {
        Product::create($product);
      }
    }
}

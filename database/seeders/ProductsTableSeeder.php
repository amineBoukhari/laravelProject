<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Optionally create some categories if they don't already exist
        $category1 = Category::firstOrCreate([
            'name' => 'Electronics',
            'description' => 'Electronic gadgets and devices.'
        ]);

        $category2 = Category::firstOrCreate([
            'name' => 'Books',
            'description' => 'Read a wide range of books.'
        ]);

        // Create products with category_id
        Product::create([
            'name' => 'Sample Product 1',
            'description' => 'This is a sample description for Product 1.',
            'price' => 19.99,
            'image_url' => 'https://via.placeholder.com/150',
            'category_id' => $category1->id // Assign to Electronics category
        ]);

        Product::create([
            'name' => 'Sample Product 2',
            'description' => 'This is a sample description for Product 2.',
            'price' => 29.99,
            'image_url' => 'https://via.placeholder.com/150',
            'category_id' => $category2->id // Assign to Books category
        ]);

        // Add more products as needed
    }
}

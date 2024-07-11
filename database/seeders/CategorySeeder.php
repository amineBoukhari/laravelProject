<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Your seeding logic here
        Category::create(['name' => 'Electronics', 'description' => 'Electronic gadgets and devices.']);
        // Add more categories as needed
    }
}

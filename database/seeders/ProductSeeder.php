<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Product 1',
            'description' => 'Description of Product 1',
            'price' => 100.00,
            'image' => 'product1.jpg',
        ]);

        // Ajoutez d'autres produits si nécessaire
    }
}

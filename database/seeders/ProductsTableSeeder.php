<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Products;

class ProductsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        for ($i = 0; $i < 20; $i++) {
            Products::create([
                'name' => $faker->word(), // Tên sản phẩm ngẫu nhiên
                'sale_price' => $faker->randomFloat(2, 100, 1000), // Giá bán ngẫu nhiên
                'quantity' => $faker->numberBetween(1, 100), // Số lượng ngẫu nhiên
                'image' => $faker->imageUrl(640, 480, 'products', true), // Ảnh sản phẩm ngẫu nhiên
                'purchase_price' => $faker->randomFloat(2, 50, 900), // Giá nhập ngẫu nhiên
            ]);
        }
    }
}

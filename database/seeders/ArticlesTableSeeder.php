<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        // Tạo 10 bản ghi giả cho bảng articles
        foreach (range(1, 10) as $index) {
            DB::table('articles')->insert([
                'title' => $faker->sentence, // Tiêu đề ngẫu nhiên
                'image' => $faker->numberBetween(1,20), // URL ảnh ngẫu nhiên
                'content' => $faker->paragraphs(3, true), // Nội dung với 3 đoạn văn bản
                'created_at' => $faker->dateTimeThisYear, // Ngày tạo ngẫu nhiên trong năm nay
            ]);
        }
    }
}

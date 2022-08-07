<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        for ($i = 0; $i < 20; $i++) {
            Category::create([
                "title" => "Categoria $i",
                "slug" => "categoria-$i",
            ]);
        }
    }
}
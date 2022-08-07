<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();
        for ($i = 0; $i < 30; $i++) {
            $c = Category::inRandomOrder()->first();

            $title = Str::random(20);

            Post::create([
                "title" => $title,
                "slug" => Str::slug($title),
                "content" =>
                    "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, consequatur aspernatur iste voluptates quis dolores aliquid architecto quia? A, laborum sit! Architecto dolorum officiis aut quia minus illo neque iure</p>",
                "category_id" => $c->id,
                "description" =>
                    "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, consequatur aspernatur iste voluptates quis dolores aliquid architecto quia? A, laborum sit! Architecto dolorum officiis aut quia minus illo neque iure",
                "posted" => "yes",
            ]);
        }
    }
}
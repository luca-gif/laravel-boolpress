<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {
            $new_post = new Post();

            $new_post->title = $faker->realTextBetween($minNbChars = 20, $maxNbChars = 50, $indexSize = 2);
            $new_post->slug = Post::slugGenerator($new_post->title);
            $new_post->content = $faker->realText($maxNbChars = 600, $indexSize = 2);
            $new_post->save();
        }
    }
}
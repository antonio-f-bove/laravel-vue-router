<?php

use App\Post;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 100; $i++) { 
            $new_post = new Post();
    
            $new_post->title = $faker->words(rand(5, 10), true);
            $new_post->slug = Str::slug($new_post->title);
            $new_post->content = $faker->paragraphs(rand(5, 10), true);
            $new_post->published_at = $faker->optional()->dateTimeThisCentury();
    
            $new_post->save();
        }
    }
}

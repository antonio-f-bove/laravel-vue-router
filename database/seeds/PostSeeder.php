<?php

use App\Category;
use App\Post;
use App\Tag;
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
        $categories = Category::all();
        $categoryIds = $categories->pluck('id')->all();

        $tags = Tag::all();
        $tagIds = $tags->pluck('id')->all();

        for ($i=0; $i < 60; $i++) { 
            $new_post = new Post();
    
            $new_post->title = $faker->words(rand(5, 10), true);
            $new_post->slug = Str::slug($new_post->title);
            $new_post->content = $faker->paragraphs(rand(5, 10), true);
            $new_post->published_at = $faker->optional()->dateTimeThisCentury();
            $new_post->category_id = $faker->optional()->randomElement($categoryIds);
    
            $new_post->save();

            $new_post->tags()->attach($faker->randomElements($tagIds, rand(0,3)));
        }
    }
}

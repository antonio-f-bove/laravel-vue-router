<?php

use App\Tag;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $tagNames = [
            'breakfast',
            'lunch',
            'dinner',
            'happy hour',
            'action',
            'manga',
            'dc',
            'marvel',
            'fantasy',
            'fiction',
            'romantic',
            'streaming',
            'live',
            'dungeon crawler',
            'souls-like',
            'yoga',
            'meditation',
        ];

        foreach ($tagNames as $name) {
            
            $tag = new Tag();
            $tag->name = $name;
            $tag->save();
        }
    }
}

<?php

use App\Category;
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
        $categories = [
            'Food',
            'Comics',
            'Books',
            'TV',
            'Video Games',
            'Health',
        ];

        foreach ($categories as $name) {
            $cat = new Category();
            $cat->name = $name;
            $cat->save();
        }
    }
}

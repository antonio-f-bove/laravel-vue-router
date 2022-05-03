<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
    ];

    public static function getUniqueSlug($title) {
        $base_slug = Str::slug($title);
        $slug = $base_slug;

        $existing_post = Post::where('slug', $slug)->first();
        
        $count = 1;
        while ($existing_post) {
            $slug = $base_slug . '-' . $count;
            $existing_post = Post::where('slug', $slug)->first();
            $count++;
        }

        return $slug;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }

    protected $guarded = [
        'slug',
        'published_at',
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

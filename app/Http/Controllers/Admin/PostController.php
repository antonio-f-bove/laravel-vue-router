<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePost;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  {custom request}  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePost $request)
    {
    //     $validated = $request->validate([
    //         'title' => 'required|max:150',
    //         'content' => 'required',
    //     ]);

        $validated = $request->validated();

        $post = new Post();
        $post->fill($validated);
        $post->slug = Post::getUniqueSlug($post->title);
        $post->save();
        
        return redirect()->route('admin.posts.index');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Post $post)
    // {
    //     return view('admin.posts.show', compact('post'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePost $request, Post $post)
    {
        $validated = $request->validated();
        $post->update($validated);
        $post->slug = Post::getUniqueSlug($post->title);
        // TODO slug doesn't update
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index');
    }

    public function publish(Post $post)
    {
        $post->published_at = date('Y-m-d');

        // dd($post);
        $post->update();

        return redirect()->route('admin.posts.index');
    }

}

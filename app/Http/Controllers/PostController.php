<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
//        $posts = Post::where('is_published', 1)->first();
//        dump($posts);
        $posts = Post::all();

        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string'
        ]);
        Post::create($data);
        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
//        $post = Post::findOrFail($id);
//        dd($post->title);
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string'
        ]);
        $post->update($data);
        return redirect()->route('post.show', $post->id);


//        $post = Post::find(6);
//
//        $post->update([
//            'title' => 'updated',
//            'content' => 'updated',
//            'image' => 'updated',
//            'likes' => 1000,
//            'is_published' => 0,
//        ]);
//        dd('updated');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }


    public function delete()
    {

//        $post = Post::find(2);
//        $post->delete();
//        dd('deleted');
//
//        $post = Post::withTrashed()->find(2);
//        $post->restore();
//        dd('deleted');
    }

    public function firstOrCreate()
    {
        $post = Post::firstOrCreate(
            [
                'title' => 'someeee title from phpstorm',
            ],
            [
            'title' => 'someeee title from phpstorm',
            'content' => 'someeee content from phpstorm',
            'image' => 'someeee image from phpstorm',
            'likes' => '5000',
            'is_published' => '1',
        ]);
        dump($post->title);
        dd('firstOrCreate');
    }

    public function updateOrCreate()
    {
        $post = Post::updateOrCreate(
            [
                'title' => 'updateorcreate title from phpstorm',
            ],
            [
            'title' => 'updateorcreate title from phpstorm',
            'content' => 'updateorcreate content from phpstorm',
            'image' => 'updateorcreate image from phpstorm',
            'likes' => '10000',
            'is_published' => '1',
        ]);
        dump($post->title);
        dd('updated');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller {

    public function index(){
//    return "111";

        //$a = 1;
        //dump & die
        //dd($a);

        //read action
        //$posts = Post::all();
//        foreach ($posts as $post)
//        {
//            dump($post->title);
//        }
        //dd($posts);

        //read where all
//        $posts = Post::where('title', 'Post1')->get();
//        foreach ($posts as $post)
//        {
//            dump($post->title);
//        }

        //read where one
//        $post = Post::where('title', 'Post1')->first();
//        dump($post->title);

        //read action by id
//        $post = Post::find(1);
//        dd($post);


        //with view
        $posts = Post::all();
        return view("post.index", compact("posts"));



        //hasmany

//        $category = Category::find(1);
//        dd($category->posts);

//        $post = Post::find(2);
//        dd($post->category);

//belongstomany
//        $post = Post::find(1);
//        dd($post->tags);

//        $tag = Tag::find(1);
//        dd($tag->posts);
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'post_content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);
//или
        foreach ($tags as $tag ) {
            PostTag::firstOrCreate([
                'tag_id' => $tag,
                'post_id' => $post->id,
            ]);
        }
//или
        //$post->tags()->attach($tags);

        return redirect()->route('post.index');
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
//        $posts = [
//            [
//                "title" => "Post3",
//                "post_content" =>"lorem",
//                "image" =>"3.jpg",
//                "likes" =>30,
//                "is_published" =>1
//            ],a
//            [
//                "title" => "Post4",
//                "post_content" =>"lorem",
//                "image" =>"4.jpg",
//                "likes" =>40,
//                "is_published" =>0
//            ]
//        ];
//        foreach ($posts as $item)
//        {
//            Post::create($item);
//        }
//
//        dd('create');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view("post.edit", compact("post", "categories", "tags"));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'post_content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);

        return redirect()->route('post.show', $post->id);

//        $post = Post::find(1);
//        $post->update([
//            "title" => "updated",
//            "content" => "updated",
//            "image" => "updated",
//            "likes" => 100,
//            "is_published" => 1
//        ]);
//        dd('update');
    }

    //soft delete
//    public function delete()
//    {
//        $post = Post::withTrashed()->find(2);
//        $post->restore();
//        dd('delete');
//    }


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }
    public function firstOrCreate()
    {
        $post = Post::firstOrCreate(
            ["title" => "updated2",],
            [
                "title" => "updated2",
                "content" => "updated",
                "image" => "updated",
                "likes" => 100,
                "is_published" => 1
            ]);
        dd($post->title);
    }

    public function updateOrCreate()
    {
        $post = Post::updateOrCreate(
            ["title" => "updated1"],
            [
                "title" => "updated1",
                "content" => "updated",
                "image" => "updated",
                "likes" => 100,
                "is_published" => 1
            ]);
        dd($post->title);
    }

//    public function delete()
//    {
//        $post = Post::find(2);
//        $post->delete();
//        dd('delete');
//    }
    public function view1()
    {
        return 'view1';
    }

    public function view2()
    {
        return 'view2';
    }

    public function view3()
    {
        return 'view3';
    }

}

<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use function Symfony\Component\Finder\name;

class ShowController extends BaseController {

    public function __invoke(Post $post)
    {
        return new PostResource($post);
        //return view('post.show', compact('post'));
    }
}

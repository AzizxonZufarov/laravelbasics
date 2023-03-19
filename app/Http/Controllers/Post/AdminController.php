<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;

class AdminController extends BaseController {

    public function __invoke(FilterRequest $request)
    {
        return view("post.admin");
    }
}

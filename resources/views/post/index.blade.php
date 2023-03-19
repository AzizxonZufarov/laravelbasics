@extends('layouts.main')

@section('content')
    <div>
        <div><a href="{{ route("post.create") }}">Create</a></div>
        @foreach($posts as $post)
            <a href="{{ route("post.show", $post->id) }}">{{$post->id}}.{{$post->title}}</a><br>
        @endforeach
        <div class="mt-3">
            {{$posts->withQueryString()->links()}}
        </div>
    </div>
@endsection

@extends('layouts.main')

@section('content')
<div>
    <div>{{$post->title}}</div>
    <a href="{{ route("post.edit", $post->id) }}">Edit</a>
    <form action="{{ route("post.destroy", $post->id) }}" method="post">
        @csrf
        @method("delete")
        <input type="submit" value="Delete"/>
    </form>
    <div><a href="{{route("post.index")}}">Back</a></div>
</div>
@endsection

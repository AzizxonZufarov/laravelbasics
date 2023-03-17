@extends('layouts.main')

@section('content')
    <div>
        <div>
            <form action="{{ route('post.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input value="{{old('title')}}" type="text" name="title" class="form-control" id="title" placeholder="Title">
                    @error('title')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" name="post_content"  id="post_content" placeholder="Content">{{old('post_content')}}</textarea>
                    @error('post_content')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input value="{{old('image')}}" type="text" class="form-control" name="image" id="image" placeholder="Image">
                    @error('image')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category_id">
                        @foreach($categories as $category)
                            <option
                                {{old('category_id') == $category->id ? ' selected' : ''}}
                                value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags">tags</label>
                    <select multiple class="form-control" id="tags" name="tags[]">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

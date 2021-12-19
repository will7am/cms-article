@extends('layouts.app')
@section('title','Update Article')
@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/articles" method="post" enctype="multipart/form-data" class="col-md-6 mx-auto">
            @csrf
            <p><h3 class="text-center">Please edit details for the article:</h3></p><br>
            <div class="form-group">
                <p><label for="title">Edit Article Title:</label></p>
                <p><input type="text" class="form-control" id="title" name="title" required value="{{$article->title}}"></p>
            </div><br>
            <div class="form-group">
                <p><label for="body">Edit Article Body:</label></p>
                <p><textarea class="form-control" id="body" name="body" required>{{$article->body}}</textarea></p>
            </div><br>
            <div class="form-group">
                <p><label for="image">Background Image:</label></p>
                <p><input type="file" class="form-control" id="image" name="image" required value="{{ asset('storage/article_images').'/'.$article->image }}"></p>
            </div><br>
            <button type="submit" class="btn btn-info rounded-pill col-md-3">UPDATE</button>
            <a type="button" class="btn btn-info rounded-pill col-md-3" href="/articles/{{$article->id}}">BACK</a>
        </form>
    </div>
@endsection

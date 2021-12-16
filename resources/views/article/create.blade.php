@extends('layouts.app')
@section('title','Create Article')
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
        <p><h3 class="text-center">Please enter details for the new article:</h3></p><br>
        <div class="form-group">
            <p><label for="title">Enter Article Title:</label></p>
            <p><input type="text" class="form-control" id="title" name="title" required></p>
        </div><br>
        <div class="form-group">
            <p><label for="body">Enter Article Body:</label></p>
            <p><textarea class="form-control" id="body" name="body" required></textarea></p>
        </div><br>
        <div class="form-group">
            <p><label for="image">Background Image:</label></p>
            <p><input type="file" class="form-control" id="image" name="image" required></p>
        </div><br>
        <button type="submit" class="btn btn-info rounded-pill col-md-3">CREATE</button>
        <button type="reset" class="btn btn-info rounded-pill col-md-3">RESET</button>
    </form>
</div>
@endsection

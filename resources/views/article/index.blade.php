@extends("layouts.app")
@section('title','Article list')
@section("content")
    <br>
    <div class="container">
        <p><h3 class="text-center">Article List</h3></p>
            <p class="text-center"><a href='/articles/create'>
                <button class='btn btn-info col-md-2 rounded-pill'>Add New Article</button>
            </a>
            </p>
        <div class="row">
        @foreach($articles as $article)
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('storage/article_images').'/'.$article->image }}" class="card-img-top"
                             alt="background image">
                        <div class="card-body">
                            <h5 class="card-title text-justify">{{ucfirst($article->title)}}</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <button class="btn btn-info rounded-pill" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#toggle{{$article->id}}" aria-expanded="false"
                                            aria-controls="toggle{{$article->id}}">
                                        Body
                                    </button>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-info rounded-pill" type="button"
                                            onclick="location.href='/articles/{{$article->id}}'">
                                        Details
                                    </button>
                                </div>
                                <div class="col-md-4">
                                <form method="post" action="/articles/{{$article->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-info rounded-pill">Delete</button>
                                </form>
                            </div>
                            </div>
                            <div class="collapse" id="toggle{{$article->id}}">
                                <div class="card-body ">
                                    {{$article->body}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
@endsection

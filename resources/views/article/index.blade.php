@extends("layouts.app")
@section('title','Article list')
@section("content")
    <br>
    <div class="container">
        <p>
        <h3 class="text-center">Article List</h3></p>
        @can('create',App\User::class)
            <p class="text-center"><a href='/articles/create'>
                    <button class='btn btn-info col-md-2 rounded-pill'>Add New Article</button>
                </a>
            </p>
        @endcan
        <div class="row">
            @foreach($articles as $article)
                <div class="col-md-4 mb-4">
                    <div class="card mx-auto" style="width: 18rem;">
                        <img src="{{ asset('storage/article_images').'/'.$article->image }}" class="card-img-top"
                             alt="background image">
                        <div class="card-body text-center">
                            <h5 class="card-title text-justify">{{ucfirst($article->title)}}</h5>

                            <button class="btn btn-info rounded-pill col-md-8" type="button"
                                    onclick="location.href='/articles/{{$article->id}}'">
                                Read Article
                            </button>
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

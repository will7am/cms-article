@extends("layouts.app")
@section('title','Article Details')

@section("content")
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="col-md-9 mx-auto">
                    <img src="{{ asset('storage/article_images').'/'.$article->image }}" class="card-img"
                         alt="article photo">
                </div>
                <div class="text-md-center">
                    <p>
                    <h4 class="card-title fw-bold">
                        {{ucfirst($article->title)}}
                    </h4>
                    </p>
                    <p class="">Author:  <b>{{ucfirst($article->user->name)}}</b></p>
                    <p>
                    <h6 class="card-subtitle"> {{$article->body}}</h6>
                    </p><br>

                    <div class="">
                        @can('create',App\User::class)
                            <button class="btn btn-info col-6 rounded-pill" type="button"
                                    onClick="location.href='/articles/{{$article->id}}/edit'">Update Aricle
                            </button>
                        <p>
                            <div class="">
                                <button type="button" class="btn btn-danger rounded-pill col-md-6" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                    Delete
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="delete_modal" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h4>Are you sure to delete this article?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary rounded-pill col-md-2" data-bs-dismiss="modal">No</button>
                                                <form method="post" action="/articles/{{$article->id}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger rounded-pill">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </p>
                        @endcan
                        <button class="btn btn-info col-6 rounded-pill" type="button"
                                onClick="location.href='/articles'">Go back
                        </button>
                    </div>

                </div>
                <br>

            </div>
        </div>

    </div>
@endsection

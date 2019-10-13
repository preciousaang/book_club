@extends('layouts.base')
@section('title', $book->title)
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-3">
            <div class="card">                
                <img class="card-img-top img-thumbnail" src="{{asset('storage/uploads/'.$book->cover_image)}}" alt="{{$book->title}}">
                <div class="card-body">
                    Category: <a class="text-dark" href="{{route('category-books', $book->category->id)}}">{{$book->category->title}}</a><br>
                    Downloadable at <a href="{{__($book->purchase_link)}}">this site</a><hr>
                    Average Rating: <strong>{{$avg_rating}} out of 10</strong><br>
                   
                    <hr>
                   <p class="text-center"><i>Based on published rating</i></p>
                   @can('update', $book)
                    <a href="{{route('edit-book', $book->id)}}" class="btn btn-block btn-dark">Edit</a>
                   @endcan
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <h3 style="font-weight: bold;">{{ucfirst($book->title)}}</h3>
            <p class="small">By: <strong>{{$book->author}}</strong></p>
            <hr>            
            <div id="post-review" class="card">
                <div class="card-header">
                    <h4 class="text-center">Post A Review</h4>
                </div>
                <div class="card-body">
                    @auth
                    @include('partials.success')
                    @include('partials.errors')
                    <form action="{{route('add-review', $book->id)}}" method="post">
                        @csrf @method('post')                        
                        <div class="row form-group">
                            <label for="" class="col-form-label col-md-3 text-right">Review</label>
                            <div class="col-md-8">
                                <textarea required class="form-control" name="body">{{old('body')}}</textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-form-label col-md-3 text-right">Rating</label>
                            <div class="col-md-8">
                                <select name="rating" id="" class="form-control">
                                    @for($i=1; $i<=10; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-8 offset-md-3">
                                <input type="submit" class="btn btn-outline-dark" value="Post Review">
                            </div>
                            
                        </div>
                    </form>
                    @else
                    <p>
                        You have to be logged in to post a review. Login <a href="{{route('login-form', ['prev'=>url()->current()])}}">here</a>.
                    </p>
                    @endauth
                </div>
            </div>
        </div>
    </div><hr>
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Reviews</h4>
                </div>
                <div class="card-body">
                    @forelse ($book->reviews()->paginate(20) as $review)
                        <div class="card">
                            <div class="card-header">
                                @if(auth()->user() && auth()->user()->id == $review->user->id)
                                <h5>You said</h5>
                                @else
                                <h5>{{$review->user->full_name}} says </h5>
                                @endif
                            </div>
                            <div class="card-body">
                                <p>{{$review->body}}</p>
                            </div>
                            <div class="card-footer"><b>{{$review->rating}} of 10 stars</b></div>
                        </div>
                        <hr>
                        
                    @empty
                        No Reviews for this book yet. Be the first to review <a class="card-link" href="#post-review">here</a>
                    @endforelse
                </div>
                <div class="card-footer">
                    <div class="justify-content-center"> {{$book->reviews()->paginate(20)->links()}}</div>                                           
                </div>
            </div>            
        </div>

    </div>
</div>
@endsection
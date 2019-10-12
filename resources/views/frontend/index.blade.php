@extends('layouts.base')
@section('content')
    <div class="div container mt-4">
        <h4>Recent Books</h4>
        <div class="row">
            @forelse ($books as $book)
            <div class="col-md-3">
                <a href="{{route('view-book', $book->slug)}}" class="card-link">
                    <img src="{{asset('storage/uploads/'.$book->cover_image)}}" class="card-img-top" alt class="The Book">
                    <div class="card-body">
                        <h6 class="card-title">{{$book->title}}</h5>
                        <p class="card-text">
                            Author(s): <i>{{$book->author}}</i><br>
                            Average Rating: <i>{{round($book->reviews()->avg('rating'), 1)}} stars of 10</i>
                        </p>
                    </div>
                </a>
            </div>
            @empty
                <p class="alert alert-info">{{__('No Books Available Yet!')}}</p>
            @endforelse            
        </div>
        <hr>
    </div>
@endsection
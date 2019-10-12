@extends('layouts.base')
@if(isset($category))
@section('title', ucfirst($category->title).' books list')
@else
@section('title', 'Books List')
@endif
@section('content')

<div class="container mt-4">
    @if(isset($category))
    <h2 class="text-center">Category: {{ucfirst($category->title)}}</h2>
    @endif
    <div class="row">
        @forelse ($books as $book)
            <div class="col-md-3">
                <a href="{{route('view-book', $book->slug)}}" class="card-link">
                    <img src="{{asset('storage/uploads/'.$book->cover_image)}}" class="card-img-top" alt class="The Book">
                    <div class="card-body">
                        <h6 class="card-title">{{$book->title}}</h5>
                        <p class="card-text">
                            Category: <a class="text-dark" href="{{route('category-books', $book->category->id)}}">{{$book->category->title}}</a><br>
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
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{$books->links()}}
        </div>
    </div>
</div>
@endsection
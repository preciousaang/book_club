@extends('layouts.base')
@section('title', 'Books List')
@section('content')

<div class="container mt-4"> 
    <h2 class="text-center mb-3">Categories</h2>
    <div class="row">
       <div class="col-md-12">
           @include('partials.partials')
       </div>
        @forelse ($categories as $category)
            <div class="col-md-3">
                @can('delete', $category)
                    <div class="d-flex justify-content-between">
                        <div><a href="{{route('edit-category', $category->id)}}" class="btn btn-outline-info btn-sm">Edit</a></div>
                        <div><a href="{{route('delete-category', $category->id)}}" onclick="return confirm('Are you Sure?');" class="btn btn-outline-danger btn-sm">Delete</a></div>
                    </div>
                    <hr>
                @endcan
                <a href="{{route('category-books', $category->id)}}" class="card card-link">
                    <img src="{{asset('storage/uploads/'.$category->image)}}" class="card-img-top" alt="{{$category->title}}">
                    <div class="card-body">
                        <h6 class="card-title">{{$category->title}} @if($category->books_count == 0 || $category->books_count>1) ({{$category->books_count}} Books) @else 
                            ({{$category->books_count}} Book) @endif</h6>

                    </div>
                </a>
            </div>
        @empty
            <p class="alert alert-info">{{__('No Categories Available Yet!')}}</p>
        @endforelse
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{$categories->links()}}
        </div>
    </div>
</div>
@endsection
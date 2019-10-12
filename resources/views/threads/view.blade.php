@extends('layouts.base')
@section('title', $thread->title)
@section('content')    
    <div class="container mt-3">
        <h2 class="text-center">Forum</h2>
        <div class="row">
            <div class="col-md-12">
                <a class="text-dark" href="{{route('forum')}}">&laquo; All threads</a>
            </div>
            
        </div>
        <div class="row mb-3">            
            <div class="col-md-2 offset-md-10">
                <a href="{{route('reply-thread', $thread->id)}}" class="btn btn-outline-dark btn-sm">Add Reply</a>
            </div>
            
        </div>
        @forelse ($thread->posts()->paginate(30) as $post)
            <div class="card">
                <div class="card-header">
                   <h4>{{$thread->title}}</h4> by {{$post->user->full_name}}
                </div>
                <div class="card-body">
                    {!! $post->content !!}
                </div>
                <div class="card-footer">
                    <p>Posted: {{$post->created_at->diffForHumans()}}&nbsp; @can('update',$post) | <a href="{{route('edit-post', $post->id)}}" class="text-dark">Edit Post</a>@endcan</p> 
                </div>
            </div>
            <hr>
        @empty
            <p class="alert alert-info">No Posts Yet</p>
        @endforelse
        {{$thread->posts()->paginate(30)->links()}}

    </div>
@endsection
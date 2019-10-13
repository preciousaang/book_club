@extends('layouts.base')
@section('title', 'Forum')
@section('content')    
    <div class="container mt-3">
        <h2 class="text-center">Forum</h2>
        <div class="row mb-3">
            <div class="col-md-12">
                @include('partials.success')
                @include('partials.message')
                @include('partials.error')
                <div class="col-md-2 offset-md-10">
                    <a href="{{route('add-forum')}}" class="btn btn-outline-dark btn-sm mb-4">Start A New Thread</a>
                </div>
                @forelse ($threads as $thread)
                    <div class="card">
                        <div class="card-header">
                        <a href="{{route('view-thread', $thread->slug)}}" class="text-dark"><h4>{{$thread->title}}</h4></a> by {{$thread->user->full_name}}
                        </div>
                        <div class="card-body">
                            @if($thread->posts()->count() == 1){{$thread->posts()->count()}} Post
                            @else
                            {{$thread->posts()->count()}} Posts
                            @endif
                        </div>
                        <div class="card-footer">
                            <p>Created: {{$thread->created_at->diffForHumans()}}</p>
                        </div>
                    </div>
                    <hr>
                @empty
                    <p class="alert alert-info">No Threads Yet</p>
                @endforelse
                {{$threads->links()}}
               
            </div>           
        </div>
    </div>
@endsection
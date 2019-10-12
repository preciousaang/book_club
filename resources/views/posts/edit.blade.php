@extends('layouts.base')
@section('title', 'Update Post')
@section('content')
<div class="container mt-5">
    <div class="row">
            <div class="col-md-12">
                <a class="text-dark" href="{{route('view-thread', $post->thread->slug)}}">&laquo;{{$post->thread->title}}</a>
            </div>
            
    </div>
<div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Update Post</h4>
                </div>
                <div class="card-body">
                    @include('partials.errors')
                    @include('partials.success')
                    <form action="{{route('edit-post', $post->id)}}" method="POST">
                        @csrf @method('put')
                        <div class="row form-group">
                            <label for="" class="col-form-label col-md-3 text-right">Thread</label>
                            <div class="col-md-8">
                                <input type="text" disabled name="title" class="form-control" value="Reply: {{$post->thread->title}}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="body" class="col-form-label col-md-3 text-right">Body</label>
                            <div class="col-md-8">
                                <textarea id="body" name="body" rows="8" class="form-control">{{$post->content}}</textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-8 offset-md-3">
                                <button class="btn btn-outline-dark" type="submit">Post Reply</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>            
        </div>
    </div>

</div>
@section('js')
@parent
<script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
<script>
tinymce.init({
    selector: '#body'
});
</script>
@endsection
@endsection
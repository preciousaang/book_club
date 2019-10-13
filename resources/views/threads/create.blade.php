@extends('layouts.base')
@section('title', 'Add New Thread')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Start New Thread</h4>
                </div>
                <div class="card-body">
                    @include('partials.errors')
                    @include('partials.success')
                    <form action="{{route('store-forum')}}" method="POST">
                        @csrf @method('post')
                        <div class="row form-group">
                            <label for="" class="col-form-label col-md-3 text-right">Title</label>
                            <div class="col-md-8">
                                <input type="text" name="title" class="form-control" value="{{old('title')}}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="body" class="col-form-label col-md-3 text-right">Body</label>
                            <div class="col-md-8">
                                <textarea id="body" name="body" rows="8" class="form-control">{{old('body')}}</textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-8 offset-md-3">
                                <button class="btn btn-outline-dark" type="submit">Post</button>
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
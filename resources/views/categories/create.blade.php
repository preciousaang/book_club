@extends('layouts.base')
@section('title', 'Add Category')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h4 class="text-center text-white">Add Category</h4>
                    </div><!--End of card header-->
                    <div class="card-body">
                        @forelse ($errors->all() as $error)
                            <p class="alert alert-danger">{{$error}}</p>
                        @empty
                            
                        @endforelse
                        <form enctype="multipart/form-data" action="{{route('store-category')}}" method="post">
                            @csrf
                            @method('post')                                                       
                            <div class="row form-group">
                                <label class="col-form-label text-right col-md-3">Title <sup>*</sup></label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" required name="title" value="{{old('title')}}">
                                </div>
                            </div>                           
                            <div class="row form-group">
                                <label class="col-form-label text-right col-md-3">
                                    Description <sup>*</sup></label>
                                <div class="col-md-8">
                                    <textarea class="form-control" required  name="description">{{old('description')}}</textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-form-label text-right col-md-3">Image <sup>*</sup></label>
                                <div class="col-md-8">
                                    <input accept="image/*" type="file" required class="form-control-file mt-2" name="image">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-8 offset-md-3">
                                    <button class="btn btn-dark btn-sm">
                                        <i class="fa fa-plus"></i> Add Category
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div><!--End Of Card Body-->
                    <div class="card-footer">
                        <p class="text-center">&copy; {{date('Y')}}</p>
                    </div>
                </div><!--End Of Card-->
            </div>
        </div>
    </div>
@endsection

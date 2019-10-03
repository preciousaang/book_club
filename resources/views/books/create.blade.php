@extends('layouts.base')
@section('title', 'Add Page')
@section('title')
    @section('content')
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <h4 class="text-center text-white">Add Book</h4>
                        </div><!--End of card header-->
                        <div class="card-body">
                            <form enctype="multipart/form-data" action="{{route('store-book')}}" method="post">
                                @csrf
                                <div class="row form-group">
                                    <label class="col-form-label text-right col-md-3">Title <sup>*</sup></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="title" value="{{old('title')}}">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-form-label text-right col-md-3">
                                        Author(s) <sup>*</sup></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" value="{{old('author')}}" name="title">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-form-label text-right col-md-3">Cover Image <sup>*</sup></label>
                                    <div class="col-md-8">
                                        <input accept="image/*" type="file" class="form-control-file mt-2" name="title">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-8 offset-md-3">
                                        <button class="btn btn-dark btn-sm">
                                            <i class="fa fa-book"></i> Add Book                                        
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
@endsection
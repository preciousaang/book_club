@extends('layouts.base')
@section('title', 'Add Book')
    @section('content')
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <h4 class="text-center text-white">Add Book</h4>
                        </div><!--End of card header-->
                        <div class="card-body">
                            @forelse ($errors->all() as $error)
                                <p class="alert alert-danger">{{$error}}</p>
                            @empty
                                
                            @endforelse
                            <form enctype="multipart/form-data" action="{{route('store-book')}}" method="post">
                                @csrf
                                @method('post')
                                <div class="row form-group">
                                    <label class="col-form-label text-right col-md-3">Category <sup>*</sup></label>
                                    <div class="col-md-8">
                                        <select required class="form-control" name="category_id">
                                            <option value="">Select A Category</option>
                                            @forelse ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->title}}</option>
                                            @empty
                                                
                                            @endforelse
                                        </select>
                                    </div>
                                </div>                                
                                <div class="row form-group">
                                    <label class="col-form-label text-right col-md-3">Title <sup>*</sup></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" required name="title" value="{{old('title')}}">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-form-label text-right col-md-3">
                                        Author(s) <sup>*</sup></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" required value="{{old('author')}}" name="author">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-form-label text-right col-md-3">
                                        Purchase Link <sup>*</sup></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" required value="{{old('purchase_link')}}" name="purchase_link">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-form-label text-right col-md-3">Cover Image <sup>*</sup></label>
                                    <div class="col-md-8">
                                        <input accept="image/*" type="file" required class="form-control-file mt-2" name="cover_image">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-8 offset-md-3">
                                        <button class="btn btn-dark btn-sm">
                                            <i class="fa fa-plus"></i> Add Book
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

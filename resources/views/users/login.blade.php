@extends('layouts.base')
@section('title', 'Login')
@section('content')        
<div class="container mt-3">    
    <div class="row justify-content-center">
        <div class="col-md-5">
                <div class="row justify-content-center">
                        <i class="fa fa-book fa-4x"></i>
                    </div>
            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="text-center text-white">Login</h5>
                </div>
                <div class="card-body">
                    <div class="container">
                        @include('partials.message')
                        @include('partials.error')
                        
                        <form action="{{route('login')}}" method="POST">
                            @method('post')
                            @csrf
                                <div class="row form-group">                          
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input placeholder="Enter Username" type="text" value="{{old('username')}}" name="username" class="form-control @if(session()->has('error')) is-invalid @endif">
                                </div>
                                </div>
                                <div class="row form-group">                          
                                    <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-key"></i></span>
                                    </div>
                                    <input placeholder="Enter Password" type="password" name="password" class="form-control @if(session()->has('error')) is-invalid @endif">
                                    </div>
                                </div>
                                <div class="row form-group">                                       
                                    <div class="col-sm-8">
                                        <div class="form-check">
                                             <input name="remember" type="checkbox" class="form-check-input">
                                            <label for="" class="form-check-label">Remember Me</label>    
                                        </div>
                                    </div>                            
                                                                       
                                </div>
                                
                                <div class="row form-group">
                                <button class="btn btn-block btn-dark"><span class="fa fa-sign-in"></span> Login</button>
                                </div>
                            </form>    
                    </div>
                      
                </div>
            </div>
                        
        </div>
    </div>
    
</div>
    
           
@endsection
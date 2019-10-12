@extends('layouts.base')
@section('title', 'Sign Up')
@section('content')        
<div class="container mt-3">    
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="row justify-content-center">
                        <i class="fa fa-book fa-4x"></i>
                    </div>
            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="text-center text-white">Sign Up</h5>
                </div>
                <div class="card-body">
                    <div class="container">
                        @include('partials.errors')
                        
                        <form action="{{route('register')}}" method="POST">
                            @method('post')
                            @csrf
                                <div class="row form-group">                          
                                    <label class="col-form-label col-md-3 text-right">Username</label>
                                    <div class="col-md-8">
                                        <input required type="text" value="{{old('username')}}" name="username" class="form-control @if(session()->has('error')) is-invalid @endif">                                
                                    </div>
                                    
                                </div>
                                <div class="row form-group">                          
                                    <label class="col-form-label col-md-3 text-right">Password</label>
                                    <div class="col-md-8">
                                        <input required type="password" value="{{old('password')}}" name="password" class="form-control @if(session()->has('error')) is-invalid @endif">                                
                                    </div>                                        
                                </div>
                                <div class="row form-group">                          
                                    <label class="col-form-label col-md-3 text-right">First Name</label>
                                    <div class="col-md-8">
                                        <input required type="text" value="{{old('first_name')}}" name="first_name" class="form-control @if(session()->has('error')) is-invalid @endif">                                
                                    </div>                                        
                                </div>
                                <div class="row form-group">                          
                                    <label class="col-form-label col-md-3 text-right">Last Name</label>
                                    <div class="col-md-8">
                                        <input  required type="text" value="{{old('last_name')}}" name="last_name" class="form-control @if(session()->has('error')) is-invalid @endif">                                
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-form-label col-md-3 text-right">Email</label>
                                    <div class="col-md-8">
                                        <input required type="email" value="{{old('email')}}" name="email" class="form-control @if(session()->has('error')) is-invalid @endif">                                
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
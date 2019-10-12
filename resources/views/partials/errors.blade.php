@forelse ($errors->all() as $error)
    <p class="alert alert-danger">{{$error}}</p>
@empty
    
@endforelse
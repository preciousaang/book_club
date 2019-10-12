@if(session()->has('error'))
<p style="border-radius: 0px !important;" class="alert alert-danger">
    {{session()->get('error')}}
</p>
@endif
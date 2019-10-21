<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a href="{{route('homepage')}}" class="navbar-brand">Esther's Book Club</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="{{route('homepage')}}" class="nav-link @if(url()->current()==route('homepage')) active @endif"><i class="fa fa-home"></i>Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('forum')}}" class="nav-link @if(url()->current()==route('forum')) active @endif"><i class="fa fa-newspaper-o"></i>&nbsp;Forum</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('list-categories')}}" class="nav-link @if(url()->current()==route('list-categories')) active @endif"><i class="fa fa-list"></i> Categories</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('list-books')}}" class="nav-link @if(url()->current()==route('list-books')) active @endif"><i class="fa fa-book"></i>&nbsp;Books</a>
                </li>
                @can('create', App\Book::class)
                <li class="nav-item">
                  <a href="{{route('add-book')}}" class="nav-link @if(url()->current()==route('add-book')) active @endif"><i class="fa fa-plus"></i>&nbsp;Add Book&nbsp;<i class="fa fa-book"></i></a>
                </li>
                @endcan
                @can('create', App\Category::class)
                <a href="{{route('add-category')}}" class="nav-link @if(url()->current()==route('add-category')) active @endif"><i class="fa fa-plus"></i>&nbsp;Add Category&nbsp;</a>
                @endcan
            </ul>
            <div class="dropdown-divider"></div>

            <form action="{{route('search')}}" method="get" class="form-inline my-2 my-lg-0">
                @csrf
                <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" value="{{request()->get('search')}}" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            </form>

            <div class="dropdown-divider"></div>
            <ul class="navbar-nav mr-3">
              @auth
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown">Hello, {{auth()->user()->full_name}}!</a>       
                  <div class="dropdown-menu">
                    {{--<a class="dropdown-item" href="#">Profile</a>
                    <div class="dropdown-divider"></div>--}}
                    <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                  </div>
              </li>
              @endguest
              @guest
                <li class="nav-item">
                    <a class="nav-link @if(url()->current()==route('login-form')){{__('active')}}@endif" href="{{route('login-form')}}">Login</a>                    
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(url()->current()==route('signup')){{__('active')}}@endif" href="{{route('signup')}}">Sign Up</a>
                </li>
              @endguest
            </ul>

        </div>
    </nav>
    <div style="margin-top: 70px;"></div>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FastFood') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css')}}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'FastFood') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                        <li><a href="#">CART  <span class="badge">5</span></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>



<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="{{route('home')}}">Home</a>

                </li>
                    <li class="list-group-item">
                        <a href="{{route('post.create')}}">Create Food Items</a>
                    </li>
                    <li class="list-group-item">
                            <a href="{{route('category.create')}}">Create Category</a>
                        </li>
                      
                        <li class="list-group-item">
                                <a href="{{route('category')}}">All Category</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('posts')}}">All Food Items</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('posts.trashed')}}">All Trashed Food Items</a>
                            </li>
                           
                            <li class="list-group-item">
                            <a href="{{route('tags.create')}}">Create Tags</a>
                        </li>
                      
                        <li class="list-group-item">
                                <a href="{{route('tags')}}">All Tags</a>
                            </li>
           
           
            </ul>
        </div>
        <div class="col-lg-8">

        @yield('content')
        </div>
    </div>
</div>

    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="{{ asset('js/toastr.min.js')}}"></script>
<script>
    @if(Session::has('success'))
    toastr.success("{{Session::get('success')}}")
    @endif
</script>

</body>
</html>

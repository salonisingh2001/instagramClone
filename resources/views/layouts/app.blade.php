<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>instagram</title>
    <link rel="icon" href="https://i.pinimg.com/originals/ff/0e/20/ff0e20de4718fe14cdd256c81c5db771.png" type="image/x-icob">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     
    
</head>
<body>
    <div id="app" class="container">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm d-flex justify-content-between">
            
                <a class="navbar-brand p-1" href="{{ url('/') }}">
                    <div class="d-flex align-items-center">
                        <div><img src="https://i.pinimg.com/originals/ff/0e/20/ff0e20de4718fe14cdd256c81c5db771.png" alt="" width=50px height=50px class="p-1" ></div>
                        
                        <div style="padding-left:10px;">instagram</div>
                    </div>
                </a>
    
                <form action="/search" method="POST" role="search" class="d-flex d-inline ">
                        @csrf
                        <div class="input-group">
                            <input class="form-control" name="q" type="search" placeholder="Search" aria-label="Search">
                          </div>
                    </form>
                    
                <div>

                

                <div class="" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto  ">
                        

                    </ul>
                    

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav " >
                        <!-- Authentication Links -->
                        
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                      
                        @else
                        <div class="d-flex align-content-center justify-content-evenly">
                        <a href="/profile/{{Auth::user()->id}}" class="nav-item p-2"><img class="nav-item" src="https://cdn0.iconfinder.com/data/icons/web-seo-and-advertising-media-1/512/197_Home_Instagram_Interface-512.png" height=30 >  </a>
                        <a href="chat" class="nav-item p-2"><img class="nav-item" src="https://cdn-icons-png.flaticon.com/512/1384/1384090.png" height=30 >  </a>
                        <a href="/posts/create" class="nav-item p-2"><img class="nav-item" src="https://th.bing.com/th/id/OIP.avKFYR89YoSLu_Oz9GQ1kgHaHa?pid=ImgDet&rs=1" height=30 >  </a>
                            <a href="/explore" class="nav-item p-2"><img class="nav-item" src="https://www.bing.com/th?id=OIP.SPqq2Lr5mmcee2M8jJ45rQHaHa&w=250&h=250&c=8&rs=1&qlt=90&o=6&pid=3.1&rm=2" height=30 >  </a>
                           
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="/storage/{{ Auth::user()->profile->image }}" height=30 class="rounded-circle">
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
</div>
                            
                            @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

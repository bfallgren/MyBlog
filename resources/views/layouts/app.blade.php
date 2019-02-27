<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'My BLOG') }}</title>

    <!-- Scripts -->
    <!--<script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> 

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" media="all" rel="stylesheet" type="text/css" />
    
</head>
<body>
    

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'My BLOG') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                 <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style=color:navy>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item btn btn-primary" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style=color:navy>
                                    Help
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   <button class="dropdown-item btn btn-primary" id="myBtn" data-toggle="modal" data-target="#myModal" >About</button>
                                </div>                
                            </li>


                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">About MyBlog</h4>
                                  </div>
                                  <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p> <h5> Features:
                                            </div>
                                            <div class="col-md-9">
                                                <p>CRUD with delete confirmation</p>
                                                <p>Search/Filter algorithm</p>
                                                <p>Help Modal</p>
                                                <p>Authentication and </p>
                                                <p>login/logout redirection</p>
                                                <p>Dynamic drop-down menu</p>
                                                <p>Laravel Pagination</p>
                                                <p>FontAwesome Icons</p>
                                                <br></br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p> <h5> Build Resources:
                                            </div>
                                            <div class="col-md-9">
                                                <p>Linux Mint v.19</p>
                                                <p>Laravel 5.7</p>
                                                <p>Bootstrap v.3.3.6 (blade)</p>
                                                <p>Bootstrap v.4.0.0</p>
                                                <p>MySql V.14.14 Distrib 5.7.22</p>
                                                <p>FontAwesome v.5.7.1</p>
                                                <p>php v.7.1.3</p>
                                                <p>jquery v.3.2</p>
                                                <p>vue v.2.5.17</p>
                                                <br></br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p> <h5> Credits:
                                            </div>
                                            <div class="col-md-9">
                                                <p>Stackoverflow.com</p>
                                                <p>AppDividen.com</p>
                                                <p>Medium.com</p>
                                                <p>LaravelDocs</p>
                                                <p>itsolutionstuff.com</p>
                                                <p>ministackoverflow.com</p>
                                                <p>laravel-news.com</p>
                                                <p>easylaravelbook.com</p>
                                                <p>auth0.com</p>
                                                <p>snipe.net</p>
                                                <p>codexworld.com</p>
                                                <p>tutorialspoint.com</p>
                                                <p>incoder.com</p>
                                                <p>laravelcode.com</p>
                                            </div>
                                        </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>

                           
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main >
            @yield('content')
        </main>
    </div>
       <script>
    // Get the modal
        var modal = document.getElementById('myModal');

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
          modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
    </script>
</body>
</html>

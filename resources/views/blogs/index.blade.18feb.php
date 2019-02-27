<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>BLOG Index</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
   
    <!-- using font-awesome (free/solid) icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/solid.css" integrity="sha384-r/k8YTFqmlOaqRkZuSiE9trsrDXkh07mRaoGBMoDcmA58OHILZPsk29i2BsFng1B" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/fontawesome.css" integrity="sha384-4aon80D8rXCGx9ayDt85LbyUHeMWd3UiBaWliBlJ53yzm9hqN21A+o1pqoyK04h+" crossorigin="anonymous">
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>
<body>
<!-- BEGIN HEADER CODE FROM app.blade.php -->
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
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color:gold"> 
                                    {{ Auth::user()->name }} 
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>      
    </div>
<!-- END HEADER CODE FROM app.blade.php -->

 <div class="container">
    <div class="py-5">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    
    @if(Auth::guest())
      <script>window.location = "/login";</script>
    @endif

    <h2>BLOG Index</h2><br  />

       <form method="GET" action="/blogs" style=float:right>
        {{ csrf_field() }}
    
        <input type="text" name="topic" />
        <input type="submit" class="btn btn-info" value="Filter"/>
        <input type="submit" class="btn btn-success" value="Reset"/>
      </form>
    

     <!-- <a href="/blogs/create" class="btn btn-success">New Entry</a> -->
    <a title='Add BLOG Entry' data-toggle='tooltip' href="/blogs/create" span class='fas fa-plus-square'style='font-size: 3em; color:green'></span></a>

    <table class="table table-bordered">
        <tr>
            <th width="80px">ID</th>
           <th>Topic</th>
            <th>Title</th>
            <th>Description</th>
            <th width="100px">Action</th>
        </tr>
        @if($blogs->count())
            @foreach($blogs as $blog)
                <tr>
                    <td>{{$blog['id']}}</td>
                    <td>{{$blog['topic']}}</td>
                    <td>{{$blog['title']}}</td>
                    <td>{{$blog['descr']}}</td>
                    
                      <!-- <td align="right"><a href="{{action('BlogController@edit', $blog['id'])}}" class="btn btn-warning">Edit</a></td> -->
                    <!-- EDIT button -->
                    <td align="left"><a title='Edit Record' data-toggle='tooltip' href="{{action('BlogController@edit', $blog['id'])}}" span class='fas fa-edit'style='font-size: 24px; color:orange'></span></a></td>
                    <td align="left">
                    <!-- DELETE button -->
                     <a href="{{ url('blogs',$blog->id) }}" class='fas fa-trash-alt'style='font-size: 24px; color:red'
                       data-tr="tr_{{$blog->id}}"
                       data-toggle="confirmation"
                       data-btn-ok-label="Delete" data-btn-ok-icon="fa fa-remove"
                       data-btn-ok-class="btn btn-sm btn-danger"
                       data-btn-cancel-label="Cancel"
                       data-btn-cancel-icon="fa fa-chevron-circle-left"
                       data-btn-cancel-class="btn btn-sm btn-default"
                       data-title="Are you sure you want to delete ?"
                       data-placement="left" data-singleton="true">
                        
                    </a>
                    
                </tr>
            @endforeach
        @endif
    </table>
</div>
</div> <!-- container / end -->


</body>


<!-- DELETE CODE -->
<script type="text/javascript">
    $(document).ready(function () {
        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.trigger('confirm');
            }
        });

        $(document).on('confirm', function (e) {
            var ele = e.target;
            e.preventDefault();


            $.ajax({
                url: ele.href,
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    console.log(data);
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                        location.reload();
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });


            return false;
        });
    });
</script>


</html>

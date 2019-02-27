<!-- index.blade.php -->
@extends('layouts.app')
@section('content') 


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>BLOG Index</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
   
    <!-- using font-awesome (free/solid) icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/solid.css" integrity="sha384-r/k8YTFqmlOaqRkZuSiE9trsrDXkh07mRaoGBMoDcmA58OHILZPsk29i2BsFng1B" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/fontawesome.css" integrity="sha384-4aon80D8rXCGx9ayDt85LbyUHeMWd3UiBaWliBlJ53yzm9hqN21A+o1pqoyK04h+" crossorigin="anonymous">
  </head>
  
  <body>
    <div class="container">
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

   <div class="search-form">
      <form method="GET" action="/blogs">
        {{ csrf_field() }}
    
        <input type="text" name="topic" />
        <input type="submit" value="Filter"/>
        <input type="submit" value="Reset"/>
      </form>
    </div>


    <!-- <a href="/blogs/create" class="btn btn-success">New Entry</a> -->
    <a title='Add BLOG Entry' data-toggle='tooltip' href="/blogs/create" span class='fas fa-plus-square'style='font-size: 3em; color:green'></span></a>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Topic</th>
        <th>Title</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
 
      @foreach($blogs as $blog)
      <tr>
        <td>{{$blog['id']}}</td>
        <td>{{$blog['topic']}}</td>
        <td>{{$blog['title']}}</td>
        <td>{{$blog['descr']}}</td>
 
        <!-- <td align="right"><a href="{{action('BlogController@edit', $blog['id'])}}" class="btn btn-warning">Edit</a></td> -->
        <td align="right"><a title='Edit Record' data-toggle='tooltip' href="{{action('BlogController@edit', $blog['id'])}}" span class='fas fa-edit'style='font-size: 24px; color:orange'></span></a></td>
        <td align="left">
        <form action="{{action('BlogController@destroy', $blog['id'])}}" method="post">
          @csrf
          <input name="_method" type="hidden" value="DELETE">
          <button title='Delete Record' type="submit" data-toggle='tooltip'><span class='fas fa-trash-alt'style='font-size: 24px; color:red'></span></button>                       
        </form>                 
        </td>
      </tr>
      @endforeach

    </tbody>
  </table>
  </div>
  </body>
</html>
@endsection
@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Blog
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('blogs.update', $blog->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="title">Title:</label>
          <input type="text" class="form-control" name="title" value={{ $blog->title }} />
        </div>
        <div class="form-group">
          <label for="descr">Description:</label>
          <input type="text" class="form-control" name="descr" value={{ $blog->descr }} />
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection

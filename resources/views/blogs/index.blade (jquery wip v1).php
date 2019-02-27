<!-- index.blade.php -->
@extends('layouts.app')
@section('content') 


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                @if ($message = Session::get('success'))
                <div class="product-default-alerts alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('success');?>
                @endif                
                <div class="panel-heading">All Posts</div>
                <div class="panel-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>                          
                          <th>ID</th>
                          <th>Topic</th>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                            @foreach($blogs as $blog)
                                    <tr>
                                    <td>{{$blog['id']}}</td>
                                    <td>{{$blog['topic']}}</td>
                                    <td>{{$blog['title']}}</td>
                                    <td>{{$blog['descr']}}</td>
                                    <td>
                                        <a class="btn btn-danger waves-effect waves-light remove-record" data-toggle="modal" data-url="{!! URL::route('blog-delete', $blog->id) !!}" data-id="{{$blog->id}}" data-target="#product-default-width-modal">Delete</a>
                                    </td>
                                </tr>
                            @endforeach                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Delete Product Model -->
<form action="" method="POST" class="product-delete-record-model">
    <div id="product-default-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="product-default-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="product-default-width-modalLabel">Delete Record</h4>
                </div>
                <div class="modal-body">
                    <h4>Do you really want to Delete This Record?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light">Delete</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@section('script')
<script src="{{ asset('public/js/blog-default.js') }}"></script>
@endsection  
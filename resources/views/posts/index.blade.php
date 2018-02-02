@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Posts</div>

                <div class="panel-body">
                  <table class="table">
                      <tr>
                          <th>Title</th>
                          <th>Slugs</th>
                          <th>Created</th>                          
                          <th>Action</th>
                      </tr>
                      @foreach($posts as $post)
                      <tr>
                          <td> {{$post->title}}</td>
                          <td>{{$post->user->email}}</td>
                          <td>{{ date("j M Y",strtotime($post->created_at))}}</td>
                          <td> <a href="{{ url('posts/show/'.$post->id) }}" class="btn btn-primary" >View</a> <a href="{{ url('posts/edit/'.$post->id) }}" class="btn btn-danger" >Edit</a> </td>
                      </tr>
                      @endforeach
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

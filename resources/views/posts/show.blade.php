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
                          <td> {{$post->title}}</td> 
                          
                      </tr>
                       <tr>
                        
                          <th>Slugs</th> <td> {{$post->slugs}}</td> 
                      </tr>
                       <tr>
                         
                          <th>Created</th>
                           <td>{{ date("j M Y",strtotime($post->created_at))}}</td>
                      </tr>
                     
                      
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

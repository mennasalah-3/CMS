@extends('layouts.app')

@section('content')
  <div class="clearfix">
<a href="{{route('posts.create')}}" class="btn float-right btn-success" style="margin-bottom:10px">Create new Post</a>
</div>
<div class="card card-default">
 <div class="card-header">All Posts</div>
  
    <table class="card-body table">
      
      <thead>
        <tr>
          <th>Title</th>
          <th>Description</th>
          <th>Content</th>
          <th>Image</th>  
          <th>Actions</th>         
        </tr>
      </thead>
      <tbody>
        @foreach ($all as $post)
        <tr>
        <td>{{$post->title}}</td>
        <td>{{$post->description}}</td>
        <td>{{$post->content}}</td>
        <td> <img width="100" src="{{'storage/'.$post->image}}" alt=""></td>
        <td>
        <form action="{{route('posts.destroy',$post->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn float-right btn-danger" style="margin:5px" >{{
              $post->trashed() ? 'Delete' : 'Trash'
            }}
            </button>
          </form>
        </td>
        @if(! $post->trashed())

        <td>
            <a href="{{route('posts.edit',$post->id)}}" class="btn float-right btn-success" style="margin:5px">Edit</a>
          </td>
        @else
        <td>
          <a href="{{route('restore.index',$post->id)}}" class="btn float-right btn-success" style="margin:5px">Restore</a>
        </td> 
        @endif        
        @endforeach
          </tbody>
        </table>

</div>
@endsection

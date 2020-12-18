@extends('layouts.app')

@section('content')
  <div class="clearfix">
<a href="{{route('tags.create')}}" class="btn float-right btn-success" style="margin-bottom:10px">Create new tag</a>
</div>
<div class="card card-default">
 <div class="card-header">All tags</div>
 <div class="card-body"> 
    <ul class="list-group">
        @foreach ($all as $tag)
        <li class="list-group-item">
          {{$tag->name}} <span class="ml-2 badge badge-primary">{{$tag->posts()->count()}}</span>
          
        <form action="{{route('categories.destroy',$tag->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn float-right btn-danger" style="margin:5px" >Delete
        </button>
      </form>
        <a href="{{route('categories.edit',$tag->id)}}" class="btn float-right btn-success" style="margin:5px">Edit</a>
        </li>
        @endforeach

   
    
 </div>
</div>

@endsection
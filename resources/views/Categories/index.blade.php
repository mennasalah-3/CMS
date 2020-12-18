@extends('layouts.app')

@section('content')
  <div class="clearfix">
<a href="{{route('categories.create')}}" class="btn float-right btn-success" style="margin-bottom:10px">Create new category</a>
</div>
<div class="card card-default">
 <div class="card-header">All Categories</div>
 <div class="card-body"> 
    <ul class="list-group">
        @foreach ($all as $category)
        <li class="list-group-item">
          {{$category->name}}
          
        <form action="{{route('categories.destroy',$category->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn float-right btn-danger" style="margin:5px" >Delete
        </button>
      </form>
        <a href="{{route('categories.edit',$category->id)}}" class="btn float-right btn-success" style="margin:5px">Edit</a>
        </li>
        @endforeach

   
    
 </div>
</div>

@endsection
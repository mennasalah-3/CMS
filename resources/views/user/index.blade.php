@extends('layouts.app')

@section('content')
  <div class="clearfix">
<a href="{{route('users.index')}}" class="btn float-right btn-success" style="margin-bottom:10px">Add User</a>
</div>
<div class="card card-default">
 <div class="card-header">All Users</div>
  
    <table class="card-body table">
      
      <thead>
        <tr>
          <th>Name</th>
          @if (auth()->user()->isAdmin())
              
          <th>Role</th>
              
          @endif
                   
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>

        <td>{{$user->name}}</td>
        @if (!$user->isAdmin())
        <td>
           <form action="{{route('users.make_admin',$user->id)}}" method="POST">
              @csrf
              <button class="btn btn-success" type="submit">Make Admin</button>
           </form>
          </td>
        @else
          <td>{{$user->role}}</td>
            
        @endif
        
       {{-- <td> <img width="100" src="{{'storage/'.$user->image}}" alt=""></td>
        <td> --}}
         
     {{--   <form action="{{route('posts.destroy',$post->id)}}" method="POST">
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
        @endif    --}}    
        @endforeach
          </tbody>
        </table>

</div>
@endsection

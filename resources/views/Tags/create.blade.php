@extends('layouts.app')

@section('content')
<div class="container">

      
            <div class="card">
                <div class="card-header">{{isset($tag) ? "Update tag" : "Create new tag"}}</div>
                 
                <div class="card-body">
                <form method="POST" action="{{isset($tag) ? route('categories.update',$tag->id) : route('tags.store')}}">
                        @csrf
                        @if(isset($tag))
                        @method('PUT')
                      @endif
                    <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name of Tag :</label>
                    <div class="col-md-6">
                   <input type="text" name="name" autofocus required value="{{isset($tag) ?  $tag->name : " "}}" placeholder="{{isset($tag) ?   : "tag's name "}}" class=" form-control">
                   </div>

                  
                   <div class="form-group">
                   <button class="btn btn-success">{{isset($tag) ? "Update" : "create"}}</button>
                   </div>
                    </div>    
                    @include('layouts.errors')
                </form>
                </div>
            </div>
        </div>
    
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">

      
            <div class="card">
                <div class="card-header">{{isset($category) ? "Update Category" : "Create new category"}}</div>
                 
                <div class="card-body">
                <form method="POST" action="{{isset($category) ? route('categories.update',$category->id) : route('categories.store')}}">
                        @csrf
                        @if(isset($category))
                        @method('PUT')
                      @endif
                    <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name of Category :</label>
                    <div class="col-md-6">
                   <input type="text" name="name" autofocus required value="{{isset($category) ?  $category->name : " "}}" placeholder="{{isset($category) ?   : "Category's name "}}" class=" form-control">
                   </div>

                  
                   <div class="form-group">
                   <button class="btn btn-success">{{isset($category) ? "Update" : "create"}}</button>
                   </div>
                    </div>    
                    @include('layouts.errors')
                </form>
                </div>
            </div>
        </div>
    
</div>
@endsection
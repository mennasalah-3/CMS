@extends('layouts.app')

@section('content')
<div class="container">

      
            <div class="card">
                <div class="card-header">{{isset($post) ? "Update post" : "Create new post"}}</div>
                 
                <div class="card-body">
                <form enctype="multipart/form-data" method="POST" action="{{isset($post) ? route('posts.update',$post->id) : route('posts.store')}}">
                        @csrf
                        @if(isset($post))
                          @method('PUT')
                        @endif
                    <div class="form-group col">
                    <label for="name" >Title of post :</label>
                    <div class="col-md-6">
                   <input type="text" name="title" autofocus required value="{{isset($post) ?  $post->title : " "}}" placeholder="{{isset($category) ?   : "Category's name "}}" class=" form-control">
                   </div>
                   <div class="col-md-6">
                    <label for="description" >Description of post :</label>
                    <input type="text" name="description" autofocus required value="{{isset($post) ?  $post->description: " "}}" placeholder="{{isset($post) ?   : "Post's description"}}" class=" form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="content" >Content of post :</label>
                        <input name="content" id="content" cols="30" rows="10" class="form-control" autofocus required value="{{isset($post) ?  $post->content: " "}}" placeholder="{{isset($post) ?   : "Post's content"}}" ></textarea>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="image" >Image:</label>
                        <div>
                        @if(isset($post))
                        <div class="form-group">
                            <img width="100" src="{{asset('storage/'.$post->image)}}" alt="">
                        @endif
                    </div>
                       </div>
                    <input type="file" name="image" autofocus required   class=" form-control">
                    </div>
                    <div>
                        <label for="categories">Select a Category : </label>

                            <select name="category_id" >
                           
                            @foreach ( $categories as $category )
                            <option value={{$category->id}}>{{$category->name}}</option>    
                            @endforeach
                            
                            
                            </select>
                    </div>
                    <div>
                        <label for="Tags">Select tag : </label>

                            <select name="tags[]" multiple>
                           
                            @foreach ( $tags as $tag )
                            <option value={{$tag->id}}
                                @if (isset($post))
                            
                                 @if($post->hasTag($tag->id))
                                     selected
                                 @endif
                                @endif
                                >{{$tag->name}}</option>    
                            @endforeach
                            
                            
                            </select>
                    </div>
                   <div class="form-group col-md-6">
                   <button class="btn btn-success" style="margin:5px">{{isset($post) ? "Update" : "create"}}</button>
                   </div>
                    </div>    
                    @include('layouts.errors')
                </form>
                </div>
            </div>
        </div>

</div>
@endsection
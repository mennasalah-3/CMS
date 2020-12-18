<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Storage;
class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all=Post::all();
        return view('Posts.index',compact('all',$all));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $tags=Tag::all();
      return view('Posts.create',compact('categories',$categories))->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $this->validate($request,['image' => 'required']);

        $post=Post::create([
         'title'=>$request->title,
         'description'=>$request->description,
         'content'=>$request->content,
         'image'=>$request->image->store('images','public'),
         'category_id'=>$request->category_id
        ]);
        if($request->tags){
        $post->tags()->attach($request->tags);}
     
        session()->flash('success','post created successfully !');
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illum}inate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create',['post'=>$post,'categories'=>Category::all(),'tags'=>Tag::all()]);    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request,Post $post)
    {
        $date=$request->only(['title','description','content']);
        
        if($request->hasFile('image')){
            $image = $request->image->store('images','public');
            Storage::disk('public')->delete($post->image);
          
            $data['image']=$image;
            $post->update($data);
        }
        if($request->tags){
            $post->tags()->sync($request->tags);
        }
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post=Post::withTrashed()->where('id',$id)->first();
        if($post->trashed())
        {
         Storage::disk('publ)ic')->delete($post->image);
         $post->forceDelete();
        }
        else
        {
              $post->delete();
        }
        return redirect(route('posts.index'));
    }

    public function trashed(Post $post)
    {
        $all= Post::onlyTrashed()->get();
        return view('Posts.index',compact('all',$all));
    }

    public function restore($id)
    {
        Post::withTrashed()->where('id',$id)->restore();

        return redirect(route('posts.index'));
    }
}

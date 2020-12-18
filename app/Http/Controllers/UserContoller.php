<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
class UserContoller extends Controller
{
    public function index(){
        $users=User::all();
        return view('user.index')->with('users',$users);
    }

    public function make_admin(User $user){
        $user->role="admin";
        $user->save();
        return redirect(route('users.index'));
    }
    public function profile(User $user){
        $profile=$user->profile;
        return view('user.profile',['user'=>$user,'profile'=>$profile]);
    }
    public function update(User $user,Request $request){
        $profile=$user->profile;
        $data=$request->all();
      
        $profile->update($data);
        $user->update($data);
       return redirect(route('home'));
       
    }
}


<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{
    public function getDashboard(){


        $posts=Post::orderBy('created_at','desc')->get();                   //fetch all posts

        return view('dashboard',['posts'=>$posts]);
    }


    public function postCreatePost(Request $request){

        $this->validate($request,[
                'body' =>'required|max:1000'
        ]);
        $post=new Post();

        $post->body=$request['body'];

        $message='there was an error';
        if($request->user()->posts()->save($post)){
            $message='post successfully created';
        }
        return redirect()->route('dashboard')->with(['message'=>$message]);

    }

    public function getDeletePost($post_id)
    {
        $post=Post::where('id',$post_id)->first();

        if(Auth::user()!=$post->user){
            return redirect()->back();
        }
      // $post->delete();
        //if (!is_null($post)) {
            $post->delete();
       // }

        return redirect()->route('dashboard')->with(['message'=>'successfully deleted']);


    }





}
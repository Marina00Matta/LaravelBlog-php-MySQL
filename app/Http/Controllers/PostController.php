<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    public function index()
    {
        
        $posts = Post::all();
        
        return view('index',['posts'=>$posts]);
    }

    public function show()
   
    {
        //take id from url
        $request = request();
        //saving id to a variable
        $posId = $request->post;
        //retrieve by find find funct
        $post = Post::find($posId);


        return view('show',['post'=> $post]);
    }

    public function create()
    {
        $users = User::all();
        return view('create',['users' => $users]);

    }


    public function store(StorePostRequest $request)
    {
        Post::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'user_id' => $request->user_id,
        ]);
        return redirect()->route('posts.index');
    }


    public function edit(){
        $request =request()->post;
        $post=Post::find($request);
        $users = User::all();
        
        

        return view ('edit',[
            'post' => $post,
            'users' =>$users,

        ]);


     }

     public function update(UpdatePostRequest $request){
        
        $postId =$request->post;
        $post=Post::find($postId);
         
        $post->title= $request->title;
        $post->description= $request->description;
        $post->user_id= $request->user_id;
        $post->save();

        return redirect()->route('posts.index');
     } 




     public function delete(){
        $postId =request()->post;
        $post=Post::find($postId);
         
        $post->delete();
        return redirect()->route('posts.index');
     }
}




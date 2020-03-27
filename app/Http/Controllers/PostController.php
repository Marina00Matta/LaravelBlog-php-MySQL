<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

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

    return view('create');

    }

    public function store()
    {
        $request = request();
        Post::create([
            'title'=>$request->title,
            'description'=>$request->description,
        ]);
        return redirect()->route('posts.index');
    }





}




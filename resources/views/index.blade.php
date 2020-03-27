@extends('layouts.app')

@section('content')
   
    <div class="container m-5">
    <a href="{{route('posts.create')}}" class="btn btn-success m-5">Create</a>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">User</th>
      <th scope="col">Created at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  @foreach($posts as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->description}}</td> 
       <td>{{$post->user ? $post->user->name : 'not exist'}}</td>
      <td>{{$post->created_at}}</td>
    

      <td><a href="{{route('posts.show',['post'=> $post-> id])}}" class="btn btn-primary -5">View</a></td>
    </tr>
   @endforeach
   
  </tbody>
</table>
     </div>
  @endsection 
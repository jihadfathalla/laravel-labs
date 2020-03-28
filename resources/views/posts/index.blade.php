@extends('layout.app')
@section('content')
<div class="container m-3" style="position: absolute">
<a  href="/posts/create" class="btn btn-success m-3" style="center">Create post</a> 

<table class="table">
  <thead>
    <tr>
      <th scope="col">PostNum</th>
      <th scope="col">Title</th>
      <th scope="col">Posted by</th>
      <th scope="col">Description</th>
      <th scope="col">Created_at</th>
      <th scope="col">Actions</th>

    </tr>
  </thead>
  <tbody>
  @foreach($posts as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>{{ $post->user ? $post->user->name : 'not exist'}}</td>
      <td>{{$post->description}}</td>
      <td>{{$post->created_at->toDateString()}}</td>
      <td><a href="/posts/{{$post->id}}" class="btn btn-info btn-sm">View </a>
      <a href="/posts/{{$post->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
<!--       <a href="/posts/{{$post->id}}/delete"class="btn btn-danger btn-sm" >Delete</a>
 -->    
   <a onclick="return confirm('Are you sure you want to delete this post?')" href="/posts/{{$post->id}}/delete" class="btn btn-danger btn-sm" >delete</a>


</td>
                
    </tr>
    @endforeach
  </tbody>
</table>
</div>
<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>
@endsection
@extends('layout.app')
@section('content')

   <div class="card m-5">
  <div class="card-header">
    Post info
  </div>
  <div class="card-body">
    <h5 class="card-title"><b>Title:-</b> {{$post->title}}</h5>
    <p class="card-text"><b>Description:-</b></p>
    <span>{{$post->description}}</span>
  </div>
</div>

<div class="card m-5">
  <div class="card-header">
    Post Creator info
  </div>
  <div class="card-body">
    <h5 class="card-title"><b>Name :-</b> {{$user->name}}</h5>
    <h5 class="card-title"><b>Email :-</b> {{$user->email}}</h5>

    <h5 class="card-title"><b>Created At :-</b> {{$user->created_at->format('l jS \\of F Y h:i:s A')}}</h5>
  </div>
</div>

<div class="pull-right m-5">
                <a class="btn btn-primary" href="/posts"> Back</a>
            </div>
        </div>
    </div>

@endsection
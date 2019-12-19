@extends('layouts.app')

@section('content')


<div class="container">

  <?php if ($flash = session('message')): ?>
    <div class="alert alert-success m-5">
      {{$flash}}
    </div>
  <?php endif; ?>


    <div class="row justify-content-center">
      <!-- <div class="col-3 p-5">
          <img src="https://www.istockphoto.com/gb/photo/happiness-translates-into-beauty-gm610678842-104886517" height="20px"alt="">
      </div> -->
      <div class="col-9">
          <div class="d-flex justify-content-between align-items-baseline">
            <h1>{{$user -> name}}</h1>

            @can('update', $user->profile)
            <a class="btn btn-primary"href="/p/create">Add New Post</a>
            @endcan
          </div>

          @can('update', $user->profile)
          <a class="btn btn-link float-right" href="/profile/{{$user->id}}/edit">Edit Profile</a>
          @endcan

          <div class="col-9">
            {{$user->profile['description']}}
          </div>
          <div class="col-9">
            {{$user->profile['url']}}
          </div>
      </div>
    </div>

    <div class="row justify-content-center pt-4">
      <h2>Post</h2>
    </div>
    <div class="row justify-content-center pt-4">




      <?php foreach ($user->posts as $post): ?>
        <div class="col-3 card m-2" style="width: 18rem;">
          <!-- <img src="..." class="card-img-top" alt="..."> -->
          <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="/p/{{$post->id}}" class="btn btn-primary">Read</a>

          </div>
        </div>
      <?php endforeach; ?>


    </div>
  </div>
@endsection

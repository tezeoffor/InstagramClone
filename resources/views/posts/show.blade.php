
@extends('layouts.app')

@section('content')
<div class="container">

  <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/profile/1') }}">Profile</a></li>
    <li class="breadcrumb-item active" aria-current="page">Post</li>
  </ol>
</nav>

  <!-- <div class="float-right">
      <a href="/p/{{$post->id}}/edit" class="btn btn-primary mb-1 ">Edit</a>
    <form action="/p/{{$post->id}}" method="POST">
      @csrf
      @method('DELETE')

      <div class=" float-right">
        <button class="btn btn-danger">Delete </button>
      </div>
    </form>
  </div> -->

  <div class="row ustify-content-center pt-4">
    <div class=" ">
      <!-- <img src="/storage/{{$post->image}}" class="w-100"> -->
      <h2 class="title">{{$post->title}}</h2>
    </div>
    <div class=" mb-4">
      <p>By <strong>{{$post->user->name}}</strong></p>

      <div class="row justify-content-center mt-5 pt-4 body">
        <img src="/storage/{{$post->image}}" alt="">
      </div>

      <div class="row justify-content-center mt-5 pt-4 body">
        <h5>{{$post->body}}</h5>
      </div>


    </div>

    <div class="col-8 mb-3">
        <div class="card">
          <div class="card-block m-3">
            <form class="" action="/p/{{$post->id}}/comments" method="POST">
              {{ csrf_field() }}
              <div class="form-group">
                <textarea class="form-control" id="body"name="body" placeholder="your comments"></textarea>
              </div>

              <div class="form-group m-3">
                <button type="submit" class="btn btn-primary">Add Comments</button>
              </div>
            </form>
          </div>

        </div>

      </div>

    <div class="col-8">
      <?php foreach ($post->comments as $comment): ?>


          <ul class="list-group">
            <li class="list-group-item">
              <strong>
                {{$comment->created_at->diffForHumans() }}: &nbsp;
                <div class="float-right">
                  {{$comment->user->name}}
                </div>

              </strong>

              {{$comment->body}}

            </li>
          </ul>

      <?php endforeach; ?>
    </div>

  </div>
  </div>
  @endsection

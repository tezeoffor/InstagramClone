@extends('layouts.app')

@section('content')
<div class="container">
  <form action="/p/{{$post->id}}" method="POST">
    @csrf
    @method('PUT')

    <div class="row justify-content-center">
      <div class="col-8">
        <div class="row">
          <h1>New Blog</h1>
        </div>

        <div class="form-group row">
            <label for="title" class="col-md-4 col-form-label">Blog Title</label>

                <input id="title"
                      name="title"
                      type="text" class="form-control @error('title') is-invalid @enderror"
                      title="title" value="{{ old('title') ?? $post->title}}" required autocomplete="title" autofocus>

                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

        </div>

      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-8">
        <div class="form-group row">
            <label for="body" class="col-md-4 col-form-label">Body</label>

            <textarea name="body"
                      rows="8"
                      cols="120"
                      type="textarea"
                      class="form-control @error('body') is-invalid @enderror"
                      title="body"
                      value="{{ old('body') ?? $post->body}}" required autocomplete="body"
                      placeholder="body"
                      autofocus>
            </textarea>



                @error('body')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

        </div>
          <div class="row">
            <button class="btn btn-primary">Edit Blog</button>
          </div>
      </div>
    </div>
  </form>
</div>
@endsection

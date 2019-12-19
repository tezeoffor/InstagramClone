@extends('layouts.app')

@section('content')
<div class="container">
  <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
    @csrf
    @method('PATCH')

    <div class="row justify-content-center">
      <div class="col-8">
        <div class="row">
          <h1>Edit Profile</h1>
        </div>

        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label">Description</label>

                <input id="description"
                      name="description"
                      type="text" class="form-control @error('description') is-invalid @enderror"
                      description="description" value="{{ old('description') ?? $user->profile->description }}" required autocomplete="description" autofocus>

                @error('description')
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
            <label for="url" class="col-md-4 col-form-label">url</label>

            <input name="url"
                      rows="8"
                      cols="120"
                      type="textarea"
                      class="form-control @error('url') is-invalid @enderror"
                      description="url"
                      value="{{ old('url') ?? $user->profile->url }} " required autocomplete="url"
                      autofocus>
            </input>



                @error('url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

        </div>
          <div class="row">
            <button class="btn btn-primary">Update</button>
          </div>
      </div>
    </div>
  </form>
</div>
@endsection

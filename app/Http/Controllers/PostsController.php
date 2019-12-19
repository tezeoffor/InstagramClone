<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\User;
use App\Post;


class PostsController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }


    public function create()
    {
      return view('posts.create');
    }

    public function store()
    {
      $data = request()->validate([
        'title' => 'required',
        'body' => 'required',
        'image' => ['required', 'image'],
      ]);

      $imagePath = request('image')->store('uploads', 'public');

      $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
      $image->save();

      auth()->user()->posts()->create([
        'title' => $data['title'],
        'body' => $data['body'],
        'image' => $imagePath,

      ]);


      session()->flash('message', 'New post created');

      return redirect('/profile/' . auth()->user()->id);
    }

    public function show (\App\Post $post, User $user){
      // TODO: I added user to compact, checkif it works
      return view('posts.show', compact('user', 'post'));
    }

    public function edit($id, \App\User $user){

      // $this->authorize('update', $user->post);

      $post = Post::find($id);

      return view('posts.edit', compact('post'));
    }

    public function update($id, \App\User $user){

      // $this->authorize('update', $user->post);

      $data = request()->validate([
        'title' => 'required',
        'body' => 'required',
      ]);

      $post = Post::find($id);
      $post->title = request()->input('title');
      $post->body = request()->input('body');
      $post->save();

      session()->flash('message', 'Post updated');
      // auth()->user()->posts->update($data);
      // dd($data);
      return redirect("/p/{$post->id}")->with('success', 'Post updated');
    }

    public function delete($id, \App\User $user){
      // $this->authorize('update', $user->post);
      // delete
      $post = Post::find($id);
      // dd($post);
      $post->delete();

      session()->flash('message', 'Post deleted');

      return redirect('/profile/' . auth()->user()->id);
    }
}

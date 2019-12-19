<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\User;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function store(Post $post, User $user)
    {
        // $post = Post::findOrFail($request->post_id);

        // $post->addComment(request('body'));

        // dd(request('body'));

        Comment::create([
          'body' => request('body'),
          'post_id'  => $post->id,
          'user_id'  => auth()->user()->id
        ]);

        return back();
    }
}

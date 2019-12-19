<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Post extends Model
{
    protected $guarded = [];




    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function comments()
    {
      return $this->hasMany(Comment::class);
    }

    // public function addComment($body,$post){
    //
    //   // $this->comments()->create(compact('body'));
    //   Comment::create([
    //       'body' => $body,
    //       // 'user_id' => Auth::id(),
    //       'post_id' => $post->id
    //
    //       // dd('comments');
    //   ]);
    // }
}

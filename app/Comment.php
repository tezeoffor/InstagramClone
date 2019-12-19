<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $guarded = [];

  protected $fillable = ["body", "post_id", "user_id"];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function profile()
  {
    return $this->belongsTo(Profile::class);
  }

  public function post()
  {
    return $this->belongsTo(Post::class);
  }
}

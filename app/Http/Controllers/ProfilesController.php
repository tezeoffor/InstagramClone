<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller
{
  public function index(User $user)
  {
      // $user = User::findOrFail($user);

      // return view('profiles.index', [
      //   'user' => $user,
      // ]);
      return view('profiles.index', compact('user'));
  }

  public function edit(User $user){
    $this->authorize('update', $user->profile);

    return view('profiles.edit', compact('user'));
  }

  public function update(User $user){
    $this->authorize('update', $user->profile);

    $data = request()->validate([
      'description' => 'required',
      'url' => 'url',
    ]);

    auth()->user()->profile->update($data);

    session()->flash('message', 'Profile updated');

    return redirect("/profile/{$user->id}");
  }
}

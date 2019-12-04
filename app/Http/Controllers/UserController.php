<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(User $user)
    {
    	return view('profile.edit')->withUser($user);
    }

    public function update(Request $request, User $user)
    {
    	$this->validate(request(), [
            'name' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($user->id)],
            'password' => 'required|min:6|confirmed'
        ]);

        $user->name = request('name');
        $user->email = request('email');
        $user->gender = request('gender');
        $user->password = bcrypt(request('password'));

        $user->update();

        return back()->with('success', 'Your profile have been updated!');
    }
}

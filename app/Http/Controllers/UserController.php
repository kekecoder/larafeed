<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register()
    {
        return view('user.register');
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4|confirmed',
        ]);

        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);

        $user->save();

        return redirect('/feeds')->with('register', 'Registration successful');
    }

    public function login()
    {
        return view('user.login');
    }

    public function login_user(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = $request->only('email', 'password');

        if (Auth::attempt($user)) {
            return redirect('/feeds')->with('login', 'Login Successful');
        } else {
            return back()->with('failed', 'The E-mail or Password do not match our record.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/feeds')->with('logout', 'You are now logged out');
    }
}
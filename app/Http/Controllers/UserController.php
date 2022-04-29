<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store(StoreUser $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        session()->flash('success', 'Successful registration');
        return redirect()->route('home');
    }

    public function loginForm()
    {
        return view('user.login');
    }

    public function login(LoginRequest $request)
    {
        if(Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password,
        ])){
            session()->flash('success', 'You are logged in');
            if(Auth::user()->is_admin){
               return redirect()->route('admin.index');
            } else{
                return redirect()->route('home');
            }
        }
        return redirect()->back()->with('error', 'Incorrect login or password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.create');
    }
}

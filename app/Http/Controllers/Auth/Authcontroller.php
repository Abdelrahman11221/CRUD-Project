<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Authcontroller extends Controller
{
    //
    public function getregister()
    {
        return view('adminassets.auth.register');
    }

    public function postregister(RegisterRequest $request)
    {
        // dd($request);
        User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => $request->password
        ]);
        session()->flash('done' , 'you have a successful registeration');
        return redirect(route('index'));
    }

    public function getdata()
    {
        $data = User::all();
        return view('adminassets.auth.register_data' , compact('data'));
    }

    public function getlogin()
    {
        return view('adminassets.auth.login');
    }

    public function postlogin(LoginRequest $request)
    {
        $var = $request->only('email' , 'password');
        // dd($var);
        if(Auth::attempt($var))
        {
            return redirect(route('index'));
        }
        session()->flash('error' , 'faild login');
        return redirect()->back();
        
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();
        return redirect(route('login_form'));
    }
}

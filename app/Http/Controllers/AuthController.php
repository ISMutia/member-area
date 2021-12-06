<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function registration()
    {
        return view('auth.register');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = UserModel::where('email', $request->email)
            ->where('password', $request->password)
            ->where('status', 'admin')
            ->first();

        if ($user) {
            Auth::login($user);

            return redirect()->route('dashboard')->withSuccess('You have Successfully logged in');
        }

        return redirect()->route('login')->withErrors('Ops! You have entered invalid credentials');
    }

    public function postRegistration(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|same:confirmPassword',
            'confirmPassword' => 'required|min:8',
        ]);

        User::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->withSuccess('Great! You have Successfully Register');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->withSuccess('Great! You have logout');
    }
}

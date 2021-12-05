<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function index()
    {
        if (Session::get('id') != null) {
            return redirect()->intended('dashboard')->withSuccess('You have Successfully loggedin');
        } else {
            return view('auth.loginv2');
        }
    }

    public function registration()
    {
        return view('auth.register');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = DB::select("SELECT * FROM user WHERE email='" . $request->email . "' and password='" . $request->password . "';");

        if (count($data) > 0) {

            if ($data[0]->status == "admin") {
                
                // Session::put('id', $data[0]->id);
                // Session::put('fulname', $data[0]->fullname);
                // Session::put('date_birth', $data[0]->date_birth);
                // Session::put('email', $data[0]->email);
                // Session::put('password', $data[0]->password);
                // Session::put('gambar', $data[0]->gambar);
                // Session::put('status', $data[0]->status);
                
                session()->put('data', 'bla bla');

                
                
                return redirect()->intended('dashboard')->withSuccess('You have Successfully loggedin');
            } else {
                return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
            }
        } else {
            return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
        }
    }

    public function postRegistration(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        }

        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function create(array $data)
    {
        return User::create([
            'fullname' => $data['fullname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $dataUser = UserModel::all();

        return view('user.index', ['data' => $dataUser]);
    }

    public function delete($id)
    {
        $dataUser = UserModel::find($id);
        $dataUser->delete();

        return redirect()->route('user.index')->withSuccess('Success delete user');
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => ['required'],
            'date_birth' => ['required'],
            'email' => ['required', 'unique:user,email'],
            'password' => ['required'],
            'status' => ['required'],
            'contact_wa' => ['required'],
            'address' => ['required'],
        ]);

        UserModel::create([
            'fullname' => $request->fullname,
            'date_birth' => $request->date_birth,
            'email' => $request->email,
            'password' => $request->password,
            'status' => $request->status,
            'contact_wa' => $request->contact_wa,
            'address' => $request->address,
        ]);

        return redirect()->route('user.index')->withSuccess('Success create new user');
    }

    public function edit($id)
    {
        $dataUser = UserModel::all();
        $dataUser = UserModel::find($id);

        return view(
            'user.edit',
            [
                'dataUser' => $dataUser,
            ]
        );
    }

    public function update(Request $request)
    {
        $request->validate([
            'fullname' => ['required'],
            'date_birth' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'status' => ['required'],
            'contact_wa' => ['required'],
            'address' => ['required'],
        ]);

        UserModel::where('id', $request->id)
            ->update([
                'fullname' => $request->fullname,
                'date_birth' => $request->date_birth,
                'email' => $request->email,
                'password' => $request->password,
                'status' => $request->status,
                'contact_wa' => $request->contact_wa,
                'address' => $request->address,
            ]);

        return redirect()->route('user.index')->withSuccess('Success update user');
    }
}

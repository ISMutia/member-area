<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $dataUser = UserModel::where('fullname', 'like', '%'.$request->search.'%')->get();

        return view('user.index', ['data' => $dataUser]);
    }

    public function delete($id)
    {
        $dataUser = UserModel::find($id);
        $dataUser->delete();

        return redirect('/user');
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $r)
    {
        // return "coba";
        // return $r->all();

        //protected $fillable = ["name"];
        // StatusModel::create($r->all());

        $data = new UserModel();
        $data->fullname = $r->fullname;
        $data->date_birth = $r->date_birth;
        $data->email = $r->email;
        $data->password = $r->password;
        $data->status = $r->status;
        $data->save();

        return redirect('/user');
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

    public function update(Request $r)
    {
        $data = UserModel::find($r->id);
        $data->fullname = $r->fullname;
        $data->date_birth = $r->date_birth;
        $data->email = $r->email;
        $data->password = $r->password;
        $data->status = $r->status;
        $data->save();

        return redirect('/user');
    }
}

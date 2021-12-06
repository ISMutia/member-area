<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'data' => UserModel::all(),
            'status' => 'success',
        ];
        return response()->json($data, 200);
    }
    public function create(Request $r)
    {
        $data = new UserModel();
        $data->fullname = $r->fullname;
        $data->date_birth = $r->date_birth;
        $data->email = $r->email;
        $data->password = $r->password;
        $data->status = $r->status;
        $data->save();

        $data = [
            'data' => UserModel::all(),
            'status' => 'success',
            'message' => 'Data Berhasil'
        ];
        return response()->json($data, 200);
        
    }


    public function update(Request $r, $id)
    {

        $fullname = $r->fullname;
        $date_birth = $r->date_birth;
        $email = $r->email;
        $password = $r->password;
        $status = $r->status;

        $data = UserModel::find($id);
        $data->fullname = $r->fullname;
        $data->date_birth = $r->date_birth;
        $data->email = $r->email;
        $data->password = $r->password;
        $data->status = $r->status;
        $data->save();

        $data = [
            'data' => UserModel::all(),
            'status' => 'success',
            'message' => 'Data Berhasil'
        ];
        return response()->json($data, 200);
        
    }
    public function delete($id)
    {
        $dataUser = UserModel::find($id);
        $dataUser->delete();
        
        $data = [
            'data' => UserModel::all(),
            'status' => 'success',
            'message' => 'Data Berhasil'
        ];
        return response()->json($data, 200);
        
    }

    
}

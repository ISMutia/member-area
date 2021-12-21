<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'message' => 'Data Berhasil',
        ];

        return response()->json($data, 200);
    }

    public function update(Request $r, $id)
    {
        $dataUser = UserModel::find($id);
        $dataUser->fullname = $r->fullname;
        $dataUser->date_birth = $r->date_birth;
        $dataUser->email = $r->email;
        // $data->password = $r->password;
        // $data->status = $r->status;
        $dataUser->contact_wa = $r->contact_wa;
        $dataUser->address = $r->address;
        $dataUser->save();

        $data = [
            'status' => 'success',
            'message' => 'Profile has updated',
            'data' => $dataUser
        ];

        return response()->json($data, 200);
    }
    public function updatePhoto(Request $r, $id)
    {
        if ($r->hasFile('gambar')) {
            $type = 'gambar';
            $path = $r->gambar->storeAs('public/avatar', $r->file('gambar')->getClientOriginalName());

            $dataUser = UserModel::find($id);
            $dataUser->gambar = $r->file('gambar')->getClientOriginalName();
            $dataUser->save();
        } else {
            $type = 'bukan gambar';
        }

        $data = [
            'status' => 'success',
            'message' => 'Data Berhasil',
            'gambar_url' => $dataUser->gambar_url,
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
            'message' => 'Data Berhasil',
        ];

        return response()->json($data, 200);
    }

    public function login(Request $request)
    {
        $condition = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $dataUser = UserModel::where($condition)->first();

        $data = null;
        try {

            if (strlen($dataUser->fullname) > 0) {
                $data = [
                    'status' => 'success',
                    'message' => 'Data Berhasil',
                    'data' => $dataUser,
                ];
            } else {
                $data = [
                    'status' => 'failed',
                    'message' => 'Username dan Password Salah',
                    'data' => null,
                ];
            }
        } catch (Exception $e) {
            $data = [
                'status' => 'failed',
                'message' => 'Username dan Password Salah',
                'data' => null,
            ];
        }

        return response()->json($data, 200);
    }

    public function register(Request $r)
    {
        // $r->validate([
        //     'email' => ['required', 'unique:user,email'],
        // ]);

        $data = new UserModel();
        $data->fullname = $r->fullname;
        $data->date_birth = $r->date_birth;
        $data->email = $r->email;
        //$data->password = Hash::make($r->password);
        $data->password = $r->password;
        $data->status = 'customer';
        $data->save();

        $data = [
            'data' => null,
            'status' => 'success',
            'message' => 'Berhasil Register',
        ];

        return response()->json($data, 200);
    }

    public function fcmUpdate(Request $r, $id)
    {
        $dataUser = UserModel::find($id);
        $dataUser->token_fcm = $r->token_fcm;
        $dataUser->save();

        $data = [
            'status' => 'success',
            'message' => 'Profile has updated'
        ];

        return response()->json($data, 200);
    }
}

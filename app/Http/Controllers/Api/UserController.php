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
    public function delete($id)
    {
        
    }
    public function create()
    {
        
    }
    public function store(Request $r)
    {


    }

    public function edit($id)
    {
    
    }

    public function update(Request $r)
    {
        
    }

}

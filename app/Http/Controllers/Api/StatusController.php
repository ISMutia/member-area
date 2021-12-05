<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StatusModel;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $data = [
            'data' => StatusModel::all(),
            'status' => 'success',
        ];
        return response()->json($data, 200);
    }
    public function create(Request $r)
    {

        $data = new StatusModel();
        $data->name = $r->name;
        $data->save();

        $data = [
            'data' => StatusModel::all(),
            'status' => 'success',
            'message' => 'Data Berhasil'
        ];
        return response()->json($data, 200);
    }
}

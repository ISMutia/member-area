<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProgressModel;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    public function index()
    {
        $data = [
            'data' => ProgressModel::all(),
            'status' => 'success',
        ];

        return response()->json($data, 200);
    }

    public function create(Request $r)
    {
        $data = new ProgressModel();
        $data->id_h_orders = $r->id_h_orders;
        $data->progress = $r->progress;
        $data->save();

        $data = [
            'data' => ProgressModel::all(),
            'status' => 'success',
            'message' => 'Data Berhasil',
        ];

        return response()->json($data, 200);
    }

    public function update(Request $r, $id)
    {
        $id_h_orders = $r->id_h_orders;
        $progress = $r->progress;

        $data = ProgressModel::find($id);
        $data->id_h_orders = $r->id_h_orders;
        $data->progress = $r->progress;
        $data->save();

        $data = [
            'data' => ProgressModel::all(),
            'status' => 'success',
            'message' => 'Data Berhasil',
        ];

        return response()->json($data, 200);
    }

    public function delete($id)
    {
        $dataProgress = ProgressModel::find($id);
        $dataProgress->delete();

        $data = [
            'data' => ProgressModel::all(),
            'status' => 'success',
            'message' => 'Data Berhasil',
        ];

        return response()->json($data, 200);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProgressModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgressController extends Controller
{
    public function index()
    {
        $row = DB::table('trans_d_orders')
            ->select('trans_d_orders.*','trans_h_orders.project_name')
            ->leftJoin('trans_h_orders', 'trans_d_orders.id_h_orders', '=', 'trans_h_orders.id')
            ->get();
        $data = [
            'status' => 'success',
            'data' => $row,
        ];

        return response()->json($data, 200);
    }

    public function getByUserId($id)
    {
        $row = DB::table('trans_d_orders')
            ->select('trans_d_orders.*','trans_h_orders.project_name')
            ->leftJoin('trans_h_orders', 'trans_d_orders.id_h_orders', '=', 'trans_h_orders.id')
            ->where('trans_h_orders.id_customers', $id)
            ->get();

        $data = [
            'status' => 'success',
            'data' => $row,
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
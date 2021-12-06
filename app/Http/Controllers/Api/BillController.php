<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BillModel;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {
        $data = [
            'data' => BillModel::all(),
            'status' => 'success',
        ];

        return response()->json($data, 200);
        //return BillModel::all();
    }

    public function create(Request $r)
    {
        $data = new BillModel();
        $data->id_h_orders = $r->id_h_orders;
        $data->bukti = $r->bukti;
        $data->id_status = $r->id_status;
        $data->total_bayar = $r->total_bayar;
        $data->save();

        $data = [
            'data' => BillModel::all(),
            'status' => 'success',
            'message' => 'Data Berhasil',
        ];

        return response()->json($data, 200);
    }

    public function update(Request $r, $id)
    {
        $id_h_orders = $r->id_h_orders;
        $bukti = $r->bukti;
        $id_status = $r->id_status;
        $total_bayar = $r->total_bayar;

        $data = BillModel::find($id);
        $data->id_h_orders = $r->id_h_orders;
        $data->bukti = $r->bukti;
        $data->id_status = $r->id_status;
        $data->total_bayar = $r->total_bayar;
        $data->save();

        $data = [
            'data' => BillModel::all(),
            'status' => 'success',
            'message' => 'Data Berhasil',
        ];

        return response()->json($data, 200);
    }

    public function delete($id)
    {
        $dataBills = BillModel::find($id);
        $dataBills->delete();

        $data = [
            'data' => BillModel::all(),
            'status' => 'success',
            'message' => 'Data Berhasil',
        ];

        return response()->json($data, 200);
    }
}

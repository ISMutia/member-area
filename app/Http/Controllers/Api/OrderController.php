<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrderModel;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $data = [
            'data' => OrderModel::all(),
            'status' => 'success',
        ];

        return response()->json($data, 200);
    }

    public function create(Request $r)
    {
        $data = new OrderModel();
        $data->project_name = $r->project_name;
        $data->id_price = $r->id_price;
        $data->lama_p = $r->lama_p;
        $data->mulai_p = $r->mulai_p;
        $data->selesai_p = $r->selesai_p;
        $data->id_domain = $r->id_domain;
        $data->id_customers = $r->id_customers;
        $data->save();

        $data = [
            'data' => OrderModel::all(),
            'status' => 'success',
            'message' => 'Data Berhasil',
        ];

        return response()->json($data, 200);
    }

    public function update(Request $r, $id)
    {
        $project_name = $r->project_name;
        $id_price = $r->id_price;
        $lama_p = $r->lama_p;
        $mulai_p = $r->mulai_p;
        $selesai_p = $r->selesai_p;
        $id_domain = $r->id_domain;
        $id_customers = $r->id_customers;

        $data = OrderModel::find($id);
        $data->project_name = $r->project_name;
        $data->id_price = $r->id_price;
        $data->lama_p = $r->lama_p;
        $data->mulai_p = $r->mulai_p;
        $data->selesai_p = $r->selesai_p;
        $data->id_domain = $r->id_domain;
        $data->id_customers = $r->id_customers;
        $data->save();

        $data = [
            'data' => OrderModel::all(),
            'status' => 'success',
            'message' => 'Data Berhasil',
        ];

        return response()->json($data, 200);
    }

    public function delete($id)
    {
        $dataOrder = OrderModel::find($id);
        $dataOrder->delete();

        $data = [
            'data' => OrderModel::all(),
            'status' => 'success',
            'message' => 'Data Berhasil',
        ];

        return response()->json($data, 200);
    }
}

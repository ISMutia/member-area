<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PriceModel;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index()
    {
        $data = [
            'data' => PriceModel::all(),
            'status' => 'success',
        ];

        return response()->json($data, 200);
    }

    public function create(Request $r)
    {
        $data = new PriceModel();
        $data->name = $r->name;
        $data->price = $r->price;
        $data->description = $r->description;
        $data->save();

        $data = [
            'data' => PriceModel::all(),
            'status' => 'success',
            'message' => 'Data Berhasil',
        ];

        return response()->json($data, 200);
    }

    public function update(Request $r, $id)
    {
        $name = $r->name;
        $price = $r->price;
        $description = $r->description;

        $data = PriceModel::find($id);
        $data->name = $r->name;
        $data->price = $r->price;
        $data->description = $r->description;
        $data->save();

        $data = [
            'data' => PriceModel::all(),
            'status' => 'success',
            'message' => 'Data Berhasil',
        ];

        return response()->json($data, 200);
    }

    public function delete($id)
    {
        $dataPrice = PriceModel::find($id);
        $dataPrice->delete();

        $data = [
            'data' => PriceModel::all(),
            'status' => 'success',
            'message' => 'Data Berhasil',
        ];

        return response()->json($data, 200);
    }
}

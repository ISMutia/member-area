<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DomainModel;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function index()
    {
        $data = [
            'data' => DomainModel::all(),
            'status' => 'success',
        ];

        return response()->json($data, 200);
    }

    public function create(Request $r)
    {
        $data = new DomainModel();
        $data->id_price = $r->id_price;
        $data->name = $r->name;
        $data->save();

        $data = [
            'data' => DomainModel::all(),
            'status' => 'success',
            'message' => 'Data Berhasil',
        ];

        return response()->json($data, 200);
    }

    public function update(Request $r, $id)
    {
        $id_price = $r->id_price;
        $name = $r->name;

        $data = DomainModel::find($id);
        $data->id_price = $r->id_price;
        $data->name = $r->name;
        $data->save();

        $data = [
            'data' => DomainModel::all(),
            'status' => 'success',
            'message' => 'Data Berhasil',
        ];

        return response()->json($data, 200);
    }

    public function delete($id)
    {
        $dataDomain = DomainModel::find($id);
        $dataDomain->delete();

        $data = [
            'data' => DomainModel::all(),
            'status' => 'success',
            'message' => 'Data Berhasil',
        ];

        return response()->json($data, 200);
    }
}

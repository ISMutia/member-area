<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TestimoniModel;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function index()
    {
        $data = [
            'data' => TestimoniModel::all(),
            'status' => 'success',
        ];
        return response()->json($data, 200);
    }

    public function create(Request $r)
    {

        $data = new TestimoniModel();
        $data->description = $r->description;
        $data->id_customers = $r->id_customers;

        $data->save();

        $data = [
            'data' => TestimoniModel::all(),
            'status' => 'success',
            'message' => 'Data Berhasil'
        ];
        return response()->json($data, 200);
    }

}

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
}

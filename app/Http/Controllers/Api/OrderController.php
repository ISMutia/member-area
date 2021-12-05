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
}

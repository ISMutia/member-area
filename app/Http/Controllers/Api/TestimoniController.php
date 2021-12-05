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
}

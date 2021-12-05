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
}

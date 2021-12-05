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
}

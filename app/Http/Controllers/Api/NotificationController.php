<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\NotificationModel;
use App\Models\OrderModel;
use App\Models\UserModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NotificationController extends Controller
{
    public function index($id)
    {
        $list = NotificationModel::where(['id_customers'=>$id])->get();

        $data = [
            'status' => 'success',
            'message' => 'Data Berhasil',
            'data' => $list,
        ];

        return response()->json($data, 200);
    }
}
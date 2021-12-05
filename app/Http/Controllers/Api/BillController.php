<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BillModel;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {
        // $data = [
        //     'data' => BillModel::all(),
        //     'status' => 'success',
        // ];
        // return response()->json($data, 200);
        return BillModel::all();
    }
    
    // public function create(Request $r){
    //     $data = new BillModel;
        
    //     $data->id_h_orders = $r->id_h_orders;
    //     $data->bukti = $r->bukti;
    //     $data->id_status = $r->id_status;
    //     $data->total_bayar = $r->total_bayar;
    //     $data->save();
        
    //     return "Data Berhasil"
    // }
}

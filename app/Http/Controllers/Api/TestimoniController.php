<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TestimoniModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestimoniController extends Controller
{
    public function index()
    {
        $row = DB::table('trans_h_testimonial')
            ->select('trans_h_testimonial.*', 'user.fullname')
            ->leftJoin('user', 'trans_h_testimonial.id_customers', '=', 'user.id')
            ->where('trans_h_testimonial.status', '=', 'active')
            ->get();
        $data = [
            'status' => 'success',
            'data' => $row,
        ];

        return response()->json($data, 200);
    }

    public function create(Request $r)
    {
        $data = new TestimoniModel();
        $data->description = $r->description;
        $data->id_customers = $r->id_customers;
        $data->status = 'non-active';
        $data->save();

        $data = [
            'status' => 'success',
            'message' => 'Data Berhasil',
            'data' => TestimoniModel::all(),
        ];

        return response()->json($data, 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\TestimoniModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestimoniController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->search;
        $dataTestimoni = DB::select("SELECT
        trans_h_testimonial.*,
        user.fullname AS customer_name
        FROM trans_h_testimonial
        LEFT JOIN user ON user.id = trans_h_testimonial.id_customers where user.fullname LIKE '%".$keyword."%'");

        return view('testimoni.index', [
            'data' => $dataTestimoni,
            'keyword' => $keyword,
        ]);
    }

    public function delete($id)
    {
        $dataTestimoni = TestimoniModel::find($id);
        $dataTestimoni->delete();

        return redirect('/testimoni');
        //return redirect()->route('testimoni.index')->withSuccess('Success delete testimoni');
    }
}

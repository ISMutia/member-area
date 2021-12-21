<?php

namespace App\Http\Controllers;

use App\Models\OrderModel;
use App\Models\ProgressModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgressController extends Controller
{
    public function index(Request $request)
    {
        $dataProgress = DB::select("SELECT trans_d_orders.*,
        trans_h_orders.project_name
        FROM trans_d_orders
        LEFT JOIN trans_h_orders ON trans_h_orders.id = trans_d_orders.id_h_orders ");

        return view('progress.index', [
            'data' => $dataProgress,
        ]);
    }

    public function delete($id)
    {
        $dataProgress = ProgressModel::find($id);
        $dataProgress->delete();

        return redirect('/progress');
    }

    public function create()
    {
        $dataOrder = OrderModel::all();

        return view('progress.create', ['dataOrder' => $dataOrder]);
    }

    public function store(Request $r)
    {
        // return "coba";
        // return $r->all();

        //protected $fillable = ["name"];
        // StatusModel::create($r->all());

        $data = new ProgressModel();
        $data->id_h_orders = $r->id_h_orders;
        $data->progress = $r->progress;
        $data->save();

        return redirect('/progress');
    }

    public function edit($id)
    {
        $dataOrder = OrderModel::all();
        $dataProgress = ProgressModel::find($id);

        return view('progress.edit', [
            'dataOrder' => $dataOrder,
            'dataProgress' => $dataProgress,
        ]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'progress' => ['required', 'numeric'],
        ]);

        $data = ProgressModel::find($id);
        $data->progress = $request->progress;
        $data->save();

        return redirect('/progress')->withSuccess('Success update progress project '.$data->order->project_name);
    }
}

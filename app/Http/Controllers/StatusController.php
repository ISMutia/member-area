<?php

namespace App\Http\Controllers;

use App\Models\StatusModel;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index(Request $request)
    {
        $dataStatus = StatusModel::where('name', 'like', '%'.$request->search.'%')->get();

        return view('status.index', ['data' => $dataStatus]);
    }

    public function delete($id)
    {
        $dataStatus = StatusModel::find($id);
        $dataStatus->delete();

        return redirect('/status');
    }

    public function create()
    {
        return view('status.create');
    }

    public function store(Request $r)
    {
        // return "coba";
        // return $r->all();

        //protected $fillable = ["name"];
        // StatusModel::create($r->all());

        $data = new StatusModel();
        $data->name = $r->name;
        $data->save();

        return redirect('/status');
    }

    public function edit($id)
    {
        $dataStatus = StatusModel::all();
        $dataStatus = StatusModel::find($id);

        return view(
            'status.edit',
            [
                'dataStatus' => $dataStatus,
            ]
        );
    }

    public function update(Request $r)
    {
        $data = StatusModel::find($r->id);
        $data->name = $r->name;
        $data->save();

        return redirect('/status');
    }
}

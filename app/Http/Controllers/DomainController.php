<?php

namespace App\Http\Controllers;

use App\Models\DomainModel;
use App\Models\PriceModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DomainController extends Controller
{
    public function index(Request $request)
    {
        $dataDomain = DomainModel::all();

        return view('domain.index', [
            'data' => $dataDomain
            
        ]);
    }

    public function delete($id)
    {
        $dataDomain = DomainModel::find($id);
        $dataDomain->delete();

        return redirect('/domain');
    }

    public function create()
    {
        return view('domain.create');
    }

    public function store(Request $r)
    {
        // return "coba";
        // return $r->all();

        //protected $fillable = ["name"];
        // StatusModel::create($r->all());

        $data = new DomainModel();
        $data->name = $r->name;
        $data->save();

        return redirect('/domain');
    }

    public function edit($id)
    {
        $dataDomain = DomainModel::find($id);

        return view(
            'domain.edit',
            [
                'dataDomain' => $dataDomain,
            ]
        );
    }

    public function update(Request $r)
    {
        $data = DomainModel::find($r->id);
        $data->name = $r->name;
        $data->save();

        return redirect('/domain');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\PriceModel;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index(Request $request)
    {
        $dataPrice = priceModel::where('name', 'like', '%' . $request->search . '%')->get();
        return view('price.index', ['data' => $dataPrice]);
    }
    public function delete($id)
    {
        $dataPrice = PriceModel::find($id);
        $dataPrice->delete();
        return redirect('/price');
    }
    public function create()
    {
        return view('price.create');
    }
    public function store(Request $r)
    {

        // return "coba";
        // return $r->all();

        //protected $fillable = ["name"];
        // StatusModel::create($r->all());

        $data = new PriceModel();
        $data->name = $r->name;
        $data->price = $r->price;
        $data->description = $r->description;
        $data->save();

        return redirect('/price');
    }

    public function edit($id)
    {
        $dataPrice = PriceModel::all();
        $dataPrice = PriceModel::find($id);
        return view(
            'price.edit',
            [
                'dataPrice' => $dataPrice
            ]
        );
    }

    public function update(Request $r)
    {
        $data = PriceModel::find($r->id);
        $data->name = $r->name;
        $data->price = $r->price;
        $data->description = $r->description;
        $data->save();

        return redirect('/price');
    }
}

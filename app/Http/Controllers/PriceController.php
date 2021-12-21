<?php

namespace App\Http\Controllers;

use App\Models\PriceModel;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index(Request $request)
    {
        $dataPrice = priceModel::all();

        return view('price.index', ['data' => $dataPrice]);
    }

    public function delete($id)
    {
        $dataPrice = PriceModel::find($id);
        $dataPrice->delete();

        return redirect()->route('price.index')->withSuccess('Success delete price');
    }

    public function create()
    {
        return view('price.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'price' => ['required', 'numeric'],
            'description' => ['required'],
        ]);

        $data = new PriceModel();
        $data->name = $request->name;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->save();

        return redirect()->route('price.index')->withSuccess('Success add new price');
    }

    public function edit($id)
    {
        $dataPrice = PriceModel::find($id);

        return view('price.edit', [
            'dataPrice' => $dataPrice,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'price' => ['required', 'numeric'],
            'description' => ['required'],
        ]);

        $data = PriceModel::find($request->id);
        $data->name = $request->name;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->save();

        return redirect()->route('price.index')->withSuccess('Success update price');
    }
}

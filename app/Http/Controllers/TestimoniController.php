<?php

namespace App\Http\Controllers;

use App\Models\TestimoniModel;
use App\Models\UserModel;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function index()
    {
        $data = TestimoniModel::all();

        return view('testimoni.index', [
            'data' => $data,
        ]);
    }

    public function edit($id)
    {
        $data = TestimoniModel::find($id);
        $dataUser = UserModel::all();

        return view('testimoni.edit', [
            'data' => $data,
            'dataUser' => $dataUser,
        ]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'id_customers' => ['required'],
            'status' => ['required'],
            'description' => ['required'],
        ]);

        TestimoniModel::where('id', $id)
            ->update([
                'id_customers' => $request->id_customers,
                'status' => $request->status,
                'description' => $request->description,
            ]);

        return redirect()->route('testimoni.index')->withSuccess('Success update testimoni');
    }

    public function delete($id)
    {
        $dataTestimoni = TestimoniModel::find($id);
        $dataTestimoni->delete();

        return redirect()->route('testimoni.index')->withSuccess('Success delete testimoni');
    }
}

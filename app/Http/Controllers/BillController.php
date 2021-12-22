<?php

namespace App\Http\Controllers;

use App\Models\BillModel;
use App\Models\StatusModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BillController extends Controller
{
    public function index()
    {
        $data = BillModel::all();

        return view('bill.index', [
            'data' => $data,
        ]);
    }

    public function edit($id)
    {
        $data = BillModel::find($id);
        $dataStatus = StatusModel::all();

        return view('bill.edit', [
            'data' => $data,
            'dataStatus' => $dataStatus,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_status' => ['required'],
            'bukti' => ['sometimes'],
            'total_bayar' => ['required'],
        ]);

        $bill = BillModel::find($id);
        $bill->id_status = $request->id_status;
        $bill->total_bayar = $request->total_bayar;

        if ($request->hasFile('bukti')) {
            // delete old data
            if (Storage::disk('public')->exists('bukti-pembayaran/'.$bill->bukti)) {
                Storage::disk('public')->delete('bukti-pembayaran/'.$bill->bukti);
            }

            $file = $request->file('bukti');
            $fileName = uniqid('bukti-').'.'.$file->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('bukti-pembayaran', $file, $fileName);
            $bill->bukti = $fileName;
        }

        $bill->save();

        return redirect()->route('bill.index')->withSuccess('Success update bill');
    }
}

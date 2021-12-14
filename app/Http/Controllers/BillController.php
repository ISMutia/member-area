<?php

namespace App\Http\Controllers;

use App\Models\BillModel;
use App\Models\OrderModel;
use App\Models\StatusModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->search;
        $dataBills = DB::select("SELECT m_bills.*,
        trans_h_orders.project_name,
        m_status.name AS name_status
        FROM m_bills
        LEFT JOIN trans_h_orders ON trans_h_orders.id = m_bills.id_h_orders
        LEFT JOIN m_status ON m_status.id = m_bills.id_status where trans_h_orders.project_name LIKE '%".$keyword."%'");

        return view('bill.index', [
            'data' => $dataBills,
            'keyword' => $keyword,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataOrder = OrderModel::all();
        $dataStatus = StatusModel::all();

        return view(
            'bill.create',
            [
                'dataOrder' => $dataOrder,
                'dataStatus' => $dataStatus,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $data = new BillModel();
        $data->id_h_orders = $r->id_h_orders;
        $data->bukti = $r->bukti;
        $data->id_status = $r->id_status;
        $data->total_bayar = $r->total_bayar;
        $data->save();

        return redirect('/bill');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataOrder = OrderModel::all();
        $dataStatus = StatusModel::all();
        $dataBills = BillModel::find($id);

        return view(
            'bill.edit',
            [
                'dataOrder' => $dataOrder,
                'dataStatus' => $dataStatus,
                'dataBills' => $dataBills,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r)
    {
        // dd($r->all());
        $data = BillModel::find($r->id);
        $data->id_h_orders = $r->id_h_orders;
        $data->id_status = $r->id_status;
        $data->total_bayar = $r->total_bayar;
        $data->save();

        return redirect('/bill');
        //return redirect()->route('bill.index')->withSuccess('Success update bill');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    // public function delete($id)
    // {
    //     $dataBills = BillModel::find($id);
    //     $dataBills->delete();

    //     return redirect('/bill');
    // }
}

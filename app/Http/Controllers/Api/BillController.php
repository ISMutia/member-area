<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BillModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    public function index()
    {
        $data = [
            'status' => 'success',
            'data' => BillModel::all(),
        ];

        return response()->json($data, 200);
        //return BillModel::all();
    }
    public function getBill($id)
    {
        $row = DB::table('m_bills')
            ->select('m_bills.*', 'trans_h_orders.project_name', 'trans_h_orders.name_domain', 'm_price.name as price_name', 'user.fullname')
            ->leftJoin('trans_h_orders', 'm_bills.id_h_orders', '=', 'trans_h_orders.id')
            ->leftJoin('m_price', 'trans_h_orders.id_price', '=', 'm_price.id')
            ->leftJoin('user', 'trans_h_orders.id_customers', '=', 'user.id')
            ->where('m_bills.id', $id)
            ->get();

        $data = [
            'status' => 'success',
            'data' => $row,
        ];

        return response()->json($data, 200);
    }

    public function uploadPayment(Request $r, $id)
    {
        if ($r->hasFile('bukti')) {
            $type = 'bukti';
            $path = $r->bukti->storeAs('public/bukti-pembayaran',$r->file('bukti')->getClientOriginalName());

            $dataBill = BillModel::find($id);
            $dataBill->bukti = $r->file('bukti')->getClientOriginalName();
            $dataBill->save();

        }

        $data = [
            'status' => 'success',
            'message' => 'Data Berhasil',
            'bukti_url' => $dataBill->bukti_url,
        ];

        return response()->json($data, 200);
    }

    public function getByUserId($id)
    {
        $row = DB::table('m_bills')
            ->select('m_bills.*', 'trans_h_orders.project_name', 'm_price.name as price_name')
            ->leftJoin('m_bills', 'trans_h_orders.id', '=', 'm_bills.id_h_orders')
            ->leftJoin('user', 'trans_h_orders.id_customers', '=', 'user.id')
            ->leftJoin('m_price', 'trans_h_orders.id_price', '=', 'm_price.id')
            ->where('trans_h_orders.id_customers', $id)
            ->get();

        $data = [
            'status' => 'success',
            'data' => $row,
        ];

        return response()->json($data, 200);
    }

    public function detailBill()
    {
        $row = DB::table('m_bills')
            ->select('m_bills.*', 'user.fullname', 'trans_h_orders.project_name,name_domain',  'm_price.name as price_name')
            ->leftJoin('m_bills', 'trans_h_orders.id', '=', 'm_bills.id_h_orders')
            ->leftJoin('user', 'trans_h_orders.id_customers', '=', 'user.id')
            ->leftJoin('m_price', 'trans_h_orders.id_price', '=', 'm_price.id')
            ->get();

        $data = [
            'status' => 'success',
            'data' => $row,
        ];

        return response()->json($data, 200);
    }

    public function create(Request $r)
    {
        $data = new BillModel();
        $data->id_h_orders = $r->id_h_orders;
        $data->bukti = $r->bukti;
        $data->id_status = $r->id_status;
        $data->total_bayar = $r->total_bayar;
        $data->save();

        $data = [
            'data' => BillModel::all(),
            'status' => 'success',
            'message' => 'Data Berhasil',
        ];

        return response()->json($data, 200);
    }

    public function update(Request $r, $id)
    {
        $id_h_orders = $r->id_h_orders;
        $bukti = $r->bukti;
        $id_status = $r->id_status;
        $total_bayar = $r->total_bayar;

        $data = BillModel::find($id);
        $data->id_h_orders = $r->id_h_orders;
        $data->bukti = $r->bukti;
        $data->id_status = $r->id_status;
        $data->total_bayar = $r->total_bayar;
        $data->save();

        $data = [
            'data' => BillModel::all(),
            'status' => 'success',
            'message' => 'Data Berhasil',
        ];

        return response()->json($data, 200);
    }

    public function delete($id)
    {
        $dataBills = BillModel::find($id);
        $dataBills->delete();

        $data = [
            'data' => BillModel::all(),
            'status' => 'success',
            'message' => 'Data Berhasil',
        ];

        return response()->json($data, 200);
    }
}

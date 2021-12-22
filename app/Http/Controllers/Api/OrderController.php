<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BillModel;
use App\Models\OrderModel;
use App\Models\ProgressModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index()
    {
        $row = DB::table('trans_h_orders')
            ->select('trans_h_orders.*', 'user.fullname', 'm_price.name as price_name', 'm_domain.name as domain_name', 'm_status.name as status_name')
            ->leftJoin('user', 'trans_h_orders.id_customers', '=', 'user.id')
            ->leftJoin('m_price', 'trans_h_orders.id_price', '=', 'm_price.id')
            ->leftJoin('m_domain', 'trans_h_orders.id_domain', '=', 'm_domain.id')
            ->rightJoin('m_bills', 'trans_h_orders.id', '=', 'm_bills.id_h_orders')
            ->leftJoin('m_status', 'm_bills.id_status', '=', 'm_status.id')
            ->get();

        $data = [
            'status' => 'success',
            'data' => $row,
        ];

        return response()->json($data, 200);
    }

    public function getByUserId($id)
    {
        $row = DB::table('trans_h_orders')
            ->select('trans_h_orders.*', 'user.fullname', 'm_price.name as price_name', 'm_domain.name as domain_name', 'm_status.name as status_name')
            ->leftJoin('user', 'trans_h_orders.id_customers', '=', 'user.id')
            ->leftJoin('m_price', 'trans_h_orders.id_price', '=', 'm_price.id')
            ->leftJoin('m_domain', 'trans_h_orders.id_domain', '=', 'm_domain.id')
            ->leftJoin('m_bills', 'trans_h_orders.id', '=', 'm_bills.id_h_orders')
            ->leftJoin('m_status', 'm_bills.id_status', '=', 'm_status.id')
            ->where('trans_h_orders.id_customers', $id)
            ->get();

        $data = [
            'status' => 'success',
            'data' => $row,
        ];

        return response()->json($data, 200);
    }

    public function create(Request $r)
    {
        DB::beginTransaction();

        try {
            $order = OrderModel::create([
                'project_name' => $r->project_name,
                'id_price' => $r->id_price,
                'lama_p' => $r->lama_p,
                'mulai_p' => $r->mulai_p,
                'selesai_p' => $r->selesai_p,
                'lama_domain' => Carbon::now(),
                'id_domain' => $r->id_domain,
                'id_customers' => $r->id_customers,
                'name_domain' => $r->name_domain,
                'link_group_wa' => $r->link_group_wa,

            ]);

            ProgressModel::create([
                'id_h_orders' => $order->id,
                'progress' => 0,
            ]);


            $id_price = $r->id_price;
            $totalBayar = 0;
            $price1 = 3500000;
            $price2 = 5000000;
            $price3 = 20000000;

            if ($id_price == 1) {
                $totalBayar = number_format($price1);
            } elseif ($id_price == 2) {
                $totalBayar = number_format($price2);
            } elseif ($id_price == 3) {
                $totalBayar = number_format($price3);
            }

            $m_bill = BillModel::create([
                'id_h_orders' => $order->id,
                //'bukti' => 'null',
                'id_status' => 1,
                'total_bayar' => $totalBayar

            ]);

            DB::commit();
            $data = [
                'status' => 'success',
                'message' => 'Data Berhasil',
                'id' => $order->id,
                'id_bill' => $m_bill->id,
                'data' => OrderModel::where('id', $order->id)->get()->first(),
            ];

            return response()->json($data, 200);
        } catch (Exception $e) {
            DB::rollBack();
            $data = [
                'status' => 'failed',
                'message' => $e->getMessage(),
            ];

            return response()->json($data, 200);
        }
    }

    public function update(Request $r, $id)
    {
        $data = OrderModel::find($id);
        $data->project_name = $r->project_name;
        $data->id_price = $r->id_price;
        $data->lama_p = $r->lama_p;
        $data->mulai_p = $r->mulai_p;
        $data->selesai_p = $r->selesai_p;
        $data->lama_domain = $r->lama_domain;
        $data->id_domain = $r->id_domain;
        $data->id_customers = $r->id_customers;
        $data->save();

        $data = [
            'data' => OrderModel::all(),
            'status' => 'success',
            'message' => 'Data Berhasil',
        ];

        return response()->json($data, 200);
    }

    public function delete($id)
    {
        $dataOrder = OrderModel::find($id);
        $dataOrder->delete();

        $data = [
            'data' => OrderModel::all(),
            'status' => 'success',
            'message' => 'Data Berhasil',
        ];

        return response()->json($data, 200);
    }

    public function getForm()
    {
        $price = DB::table('m_price')
            ->select('m_price.id', 'm_price.name')
            ->get();
        $domain = DB::table('m_domain')
            ->select('m_domain.id', 'm_domain.name')
            ->get();

        $data = [
            'status' => 'success',
            'price' => $price,
            'domain' => $domain,
        ];

        return response()->json($data, 200);
    }

    public function riwayat($id)
    {
        $row = DB::table('trans_h_orders')
            ->select('trans_h_orders.*', 'm_bills.id as no_bill', 'm_price.name as price_name', 'm_status.name as status_name')
            ->leftJoin('m_price', 'trans_h_orders.id_price', '=', 'm_price.id')
            ->rightJoin('m_bills', 'trans_h_orders.id', '=', 'm_bills.id_h_orders')
            ->leftJoin('m_status', 'm_bills.id_status', '=', 'm_status.id')
            ->where('trans_h_orders.id_customers', $id)
            ->get();

        $data = [
            'status' => 'success',
            'data' => $row,
        ];

        return response()->json($data, 200);
    }
}

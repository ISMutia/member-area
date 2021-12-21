<?php

namespace App\Http\Controllers;

use App\Models\BillModel;
use App\Models\DomainModel;
use App\Models\OrderModel;
use App\Models\PriceModel;
use App\Models\ProgressModel;
use App\Models\StatusModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(Request $request)
    {

        $dataOrder = DB::select("SELECT
        trans_h_orders.*,
        m_price.name AS price_name,
        m_status.name AS status_name,
        m_domain.name AS domain_name,
        user.fullname AS customer_name
        FROM trans_h_orders
        LEFT JOIN m_price ON m_price.id = trans_h_orders.id_price
        LEFT JOIN m_domain ON m_domain.id = trans_h_orders.id_domain
        LEFT JOIN m_bills ON trans_h_orders.id = m_bills.id_h_orders
        LEFT JOIN m_status ON m_status.id = m_bills.id_status
        LEFT JOIN user ON user.id = trans_h_orders.id_customers ");

        return view('order.index', [
            'data' => $dataOrder,
        ]);
    }

    public function delete($id)
    {
        $bill = BillModel::where('id_h_orders', $id)->first();
        $bill->delete();

        $progress = ProgressModel::where('id_h_orders', $id)->first();
        $progress->delete();

        $dataOrder = OrderModel::find($id);
        $dataOrder->delete();

        return redirect()->route('order.index')->withSuccess('Success delete order');
    }

    public function store(Request $r)
    {
        $data = new OrderModel();
        $data->project_name = $r->project_name;
        $data->id_price = $r->id_price;
        $data->name_domain = $r->name_domain;
        $data->id_status = $r->id_status;
        $data->lama_p = $r->lama_p;
        $data->mulai_p = $r->mulai_p;
        $data->selesai_p = $r->selesai_p;
        $data->lama_domain = $r->lama_domain;
        $data->domain_name = $r->domain_name;
        $data->id_customers = $r->id_customers;
        $data->save();

        return redirect('/order');
    }

    public function edit($id)
    {
        $dataOrder = OrderModel::find($id);

        $dataPrice = PriceModel::all();
        $dataStatus = StatusModel::all();
        $dataDomain = DomainModel::all();
        $dataUser = UserModel::all();

        return view('order.edit', [
            'dataPrice' => $dataPrice,
            'dataStatus' => $dataStatus,
            'dataDomain' => $dataDomain,
            'dataUser' => $dataUser,
            'dataOrder' => $dataOrder,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_customers' => ['required'],
            'project_name' => ['required'],
            'name_domain' => ['required'],
            'id_domain' => ['required'],
            'id_price' => ['required'],
            'lama_p' => ['required'],
            'mulai_p' => ['required'],
            'selesai_p' => ['required'],
            'lama_domain' => ['required'],
            'link_group_wa' => ['required'],
        ]);

        OrderModel::where('id', $id)
            ->update([
                'id_customers' => $request->id_customers,
                'project_name' => $request->project_name,
                'id_price' => $request->id_price,
                'name_domain' => $request->name_domain,
                'id_domain' => $request->id_domain,
                'lama_p' => $request->lama_p,
                'mulai_p' => $request->mulai_p,
                'selesai_p' => $request->selesai_p,
                'lama_domain' => $request->lama_domain,
                'link_group_wa' => $request->link_group_wa,
            ]);

        return redirect()->route('order.index')->withSuccess('Success update order');
    }
}

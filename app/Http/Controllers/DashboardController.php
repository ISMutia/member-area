<?php

namespace App\Http\Controllers;

use App\Models\OrderModel;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $data = OrderModel::select([
            'trans_h_orders.project_name',
            'trans_d_orders.progress',
            'm_status.name AS nama_status',
            'user.fullname',
        ])
            ->join('trans_d_orders', 'trans_d_orders.id_h_orders', 'trans_h_orders.id')
            ->join('m_bills', 'm_bills.id_h_orders', 'trans_h_orders.id')
            ->join('m_status', 'm_status.id', 'm_bills.id_status')
            ->join('user', 'user.id', 'trans_h_orders.id_customers')
            ->where('m_status.name', 'On Progress')
            ->get();

        $dataStatus = DB::select('SELECT *, (SELECT count(*) FROM m_bills WHERE id_status = m_status.id) jumlah FROM m_status');
        foreach ($dataStatus as &$status) {
            $status->color = 'text-success';

            if ('Waiting' === $status->name) {
                $status->color = 'text-warning';
            } elseif ('Finished' === $status->name) {
                $status->color = 'text-primary';
            } elseif ('Failed' === $status->name) {
                $status->color = 'text-danger';
            }
        }

        return view('dashboard.index', [
            'data' => $data,
            'status' => $dataStatus,
        ]);
    }
}

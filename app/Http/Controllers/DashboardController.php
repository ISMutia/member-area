<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->search;
        $dataDashboard = DB::select("SELECT user.*,
        trans_h_orders.project_name,
        trans_d_orders.progress,
        m_status.name as nama_status
        from user
        INNER JOIN trans_h_orders ON user.id  = trans_h_orders.id_customers
        INNER JOIN trans_d_orders ON trans_h_orders.id = trans_d_orders.id_h_orders
        LEFT JOIN m_bills ON trans_h_orders.id = m_bills.id_h_orders
        LEFT JOIN m_status ON m_status.id = m_bills.id_status where trans_h_orders.project_name LIKE '%".$keyword."%'");

        return view('dashboard.index', [
            'data' => $dataDashboard,
            'keyword' => $keyword,
            'fullname' => Session::get('fullname'),
        ]);
    }
}

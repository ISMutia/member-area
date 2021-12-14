<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class activeController extends Controller
{
    public function index(Request $request)
    {
        // $dataActive = DB::table('m_bills')
        //     ->select('m_bills.*', 'trans_h_orders.project_name', 'm_status.name as status_name')
        //     ->leftJoin('trans_h_orders', 'm_bills.id_h_orders', '=', 'trans_h_orders.id')
        //     ->leftJoin('m_status', 'm_bills.id_status', '=', 'm_status.id')
        //     ->paginate(5);
        $dataActive = DB::select("SELECT m_bills.*,
        trans_h_orders.project_name,
        m_status.name AS name_status
        FROM m_bills
        LEFT JOIN trans_h_orders ON trans_h_orders.id = m_bills.id_h_orders
        LEFT JOIN m_status ON m_status.id = m_bills.id_status where name = 'active'
        ");

        return view('activeProgress.index', [
            'data' => $dataActive
        ]);
    }
}

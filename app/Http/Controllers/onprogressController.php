<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class onprogressController extends Controller
{
    public function index(Request $request)
    {
        $dataOnprogress = DB::select("SELECT m_bills.*,
        trans_h_orders.project_name,
        m_status.name AS name_status
        FROM m_bills
        LEFT JOIN trans_h_orders ON trans_h_orders.id = m_bills.id_h_orders
        LEFT JOIN m_status ON m_status.id = m_bills.id_status where name = 'on progress'
        ");

        return view('onProgress.index', [
            'data' => $dataOnprogress
        ]);
    }
}

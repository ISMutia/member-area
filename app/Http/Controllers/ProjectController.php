<?php

namespace App\Http\Controllers;

use App\Models\OrderModel;
use Illuminate\Database\Eloquent\Collection;

class ProjectController extends Controller
{
    public function waiting()
    {
        $status = 'Waiting';
        $data = $this->getProjectByStatus($status);

        return view('progress.project', [
            'title' => $status,
            'data' => $data,
        ]);
    }

    public function active()
    {
        $status = 'Active';
        $data = $this->getProjectByStatus($status);

        return view('progress.project', [
            'title' => $status,
            'data' => $data,
        ]);
    }

    public function onProgress()
    {
        $status = 'On Progress';
        $data = $this->getProjectByStatus($status);

        return view('progress.project', [
            'title' => $status,
            'data' => $data,
        ]);
    }

    public function finish()
    {
        $status = 'Finish';
        $data = $this->getProjectByStatus($status);

        return view('progress.project', [
            'title' => $status,
            'data' => $data,
        ]);
    }

    public function failed()
    {
        $status = 'Failed';
        $data = $this->getProjectByStatus($status);

        return view('progress.project', [
            'title' => $status,
            'data' => $data,
        ]);
    }

    private function getProjectByStatus(string $status): Collection
    {
        return OrderModel::select([
            'trans_h_orders.project_name',
            'trans_h_orders.name_domain',
            'trans_h_orders.mulai_p',
            'trans_h_orders.selesai_p',
            'm_price.name AS package',
        ])
            ->join('m_bills', 'm_bills.id_h_orders', 'trans_h_orders.id')
            ->join('m_status', 'm_status.id', 'm_bills.id_status')
            ->join('m_price', 'm_price.id', 'trans_h_orders.id_price')
            ->where('m_status.name', $status)
            ->get();
    }
}

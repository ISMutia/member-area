<?php

namespace App\Http\Controllers;

use App\Models\OrderModel;
use Carbon\Carbon;

class SubscribeController extends Controller
{
    public function index()
    {
        $orders = OrderModel::all();

        foreach ($orders as &$order) {
            $order->lama_domain = Carbon::createFromFormat('Y-m-d', $order->lama_domain);
        }
        $expiredAt = Carbon::now()->add(3, 'month');

        // Filter lebih dari tanggal sekarang dan kurang dari tanggal 3 bulan berikutnya
        $orders = $orders->filter(function ($value) use ($expiredAt) {
            return $value->lama_domain >= Carbon::now() && $value->lama_domain <= $expiredAt;
        });

        return view('subscribe.index', [
            'orders' => $orders,
        ]);
    }
}

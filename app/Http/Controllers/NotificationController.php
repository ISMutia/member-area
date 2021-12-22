<?php

namespace App\Http\Controllers;

use App\Models\NotificationModel;
use App\Models\OrderModel;
use App\Models\UserModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NotificationController extends Controller
{
    public function index()
    {
        $users = UserModel::where('date_birth', 'LIKE', '%' . date('m-d') . '%')->get();

        foreach ($users as $user) {
            $notif = new NotificationModel();

            $notif->id_customers = $user->id;
            $notif->id_h_orders = null;
            $notif->tittle = 'Happy Birthday '.$user->fullname;
            $notif->description = 'Wish You All The Best';
            // $notif->save();
            // $res = $this->sendNotif($user, $notif);

            // dd($res->body());

            $current = NotificationModel::where('id_customers', '=',  $user->id)
                ->where('id_h_orders', '=',  null)
                ->get();
            if (count($current) == 0) {
                $notif->save();
                $res = $this->sendNotif($user, $notif);
            } else {
                //ignore
            }
        }

        $data = [
            'status' => 'success',
            'message' => 'Data Berhasil',
            'users' => $users,
        ];

        return response()->json($data, 200);
        //return redirect()->back()->withSuccess('Success update data');
    }

    public function sendNotif($user, $notif)
    {
        return $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'key=AAAAHQLIzwA:APA91bG74XIaj8GQhbslvQMVrRClKR1MRDJLRbcGvgNCNprDGRUZU7l1WOyOKheTWQoFNURgFBpQ7kYSTCwFsVRp_vK745LTfLKXoXTukHxBScKAw-hqTxu9bgYEhpKXxyDdKt2YBDxh',
        ])->post('https://fcm.googleapis.com/fcm/send', [
            'notification' => [
                'title' => $notif->tittle,
                'body' => $notif->description,
                'icon' => '',
            ],
            'android' => [
                'priority' => 'normal',
                'ttl' => '86400s',
                'notification' => [
                    'click_action' => 'OPEN_ACTIVITY_1'
                ],
            ],
            'to' => $user->token_fcm,
        ]);
    }

    public function indexTLamaDomain($month)
    {
        $eDomain = Carbon::now()->startOfMonth()->addMonth($month - 1)->format('Y-m');
        $orders = OrderModel::where('lama_domain', 'LIKE', '%' . $eDomain . '%')->get();

        foreach ($orders as $order) {
            $notif = new NotificationModel();

            $notif->id_customers = $order->id_customers;
            $notif->id_h_orders = $order->id;
            $notif->tittle = 'Domain Expired';
            $notif->description = 'Your Domain will expired in ' . $month . ' months';

            $current = NotificationModel::where('id_customers', '=',  $order->id_customers)
                ->where('id_h_orders', '=',  $order->id)
                ->get();
            if (count($current) == 0) {
                $notif->save();
                $this->sendNotifDt($order, $notif);
            } else {
                //ignore
            }
        }

        $data = [
            'status' => 'success',
            'message' => 'Data Berhasil',
            'orders' => $orders,
            // 'eDomain' => $eDomain,
        ];

        return response()->json($data, 200);
        //return redirect()->back()->withSuccess('Success update data');
    }

    //ini
    public function domainExpired()
    {
        // $eDomain = Carbon::now()->startOfMonth()->addMonth($month-1)->format('Y-m-d');
        // $orders = OrderModel::where('lama_domain', 'LIKE', '%' . $eDomain . '%')->get();
        $orders = OrderModel::where('lama_domain', 'LIKE', '%' . date('Y-m-d') . '%')->get();

        foreach ($orders as $order) {
            $notif = new NotificationModel();

            $notif->id_customers = $order->id_customers;
            $notif->id_h_orders = $order->id;
            $notif->tittle = 'Domain Expired';
            $notif->description = 'Your Domain is expired ';

            $current = NotificationModel::where('id_customers', '=',  $order->id_customers)
                ->where('id_h_orders', '=',  $order->id)
                ->get();
            if (count($current) == 0) {
                $notif->save();
                $this->sendNotifDt($order, $notif);
            } else {
                //ignore
            }
        }

        $data = [
            'status' => 'success',
            'message' => 'Data Berhasil',
            'orders' => $orders,
            // 'eDomain' => $eDomain,
        ];

        return response()->json($data, 200);
        //return redirect()->back()->withSuccess('Success update data');
    }

    //ini
    public function doneProjek()
    {
        // $eDomain = Carbon::now()->startOfMonth()->addMonth($month-1)->format('Y-m-d');
        // $orders = OrderModel::where('lama_domain', 'LIKE', '%' . $eDomain . '%')->get();
        $orders = OrderModel::where('selesai_p', 'LIKE', '%' . date('Y-m-d') . '%')->get();

        foreach ($orders as $order) {
            $notif = new NotificationModel();

            $notif->id_customers = $order->id_customers;
            $notif->id_h_orders = $order->id;
            $notif->tittle = 'Domain Expired';
            $notif->description = 'Your Projct is done ';

            $current = NotificationModel::where('id_customers', '=',  $order->id_customers)
                ->where('id_h_orders', '=',  $order->id)
                ->get();
            if (count($current) == 0) {
                $notif->save();
                $this->sendNotifDt($order, $notif);
            } else {
                //ignore
            }
        }

        $data = [
            'status' => 'success',
            'message' => 'Data Berhasil',
            'orders' => $orders,
            // 'eDomain' => $eDomain,
        ];

        return response()->json($data, 200);
        //return redirect()->back()->withSuccess('Success update data');
    }

    //ini
    public function doneDay($day)
    {
        $eDomain = Carbon::today()->subDays($day)->format('Y-m-d');
        // $orders = OrderModel::where('lama_domain', 'LIKE', '%' . $eDomain . '%')->get();
        $orders = OrderModel::where('selesai_p', 'LIKE', '%' . $eDomain . '%')->get();

        foreach ($orders as $order) {
            $notif = new NotificationModel();

            $notif->id_customers = $order->id_customers;
            $notif->id_h_orders = $order->id;
            $notif->tittle = 'Domain Expired';
            $notif->description = 'Your Project will finish in ' . $day . ' days';

            $current = NotificationModel::where('id_customers', '=',  $order->id_customers)
                ->where('id_h_orders', '=',  $order->id)
                ->get();
            if (count($current) == 0) {
                $notif->save();
                $this->sendNotifDt($order, $notif);
            } else {
                //ignore
            }
        }

        $data = [
            'status' => 'success',
            'message' => 'Data Berhasil',
            'orders' => $orders,
            // 'eDomain' => $eDomain,
        ];

        return response()->json($data, 200);
        //return redirect()->back()->withSuccess('Success update data');
    }

    public function sendNotifDt($order, $notif)
    {
        return $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'key=AAAAHQLIzwA:APA91bG74XIaj8GQhbslvQMVrRClKR1MRDJLRbcGvgNCNprDGRUZU7l1WOyOKheTWQoFNURgFBpQ7kYSTCwFsVRp_vK745LTfLKXoXTukHxBScKAw-hqTxu9bgYEhpKXxyDdKt2YBDxh',
        ])->post('https://fcm.googleapis.com/fcm/send', [
            'notification' => [
                'title' => $notif->tittle,
                'body' => $notif->description,
                'icon' => '',
            ],
            'android' => [
                'priority' => 'normal',
                'ttl' => '86400s',
                'notification' => [
                    'click_action' => 'OPEN_ACTIVITY_1'
                ],
            ],
            'to' => $order->token_fcm,

        ]);
    }
}

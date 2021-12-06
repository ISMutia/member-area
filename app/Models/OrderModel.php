<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    protected $table = "trans_h_orders";

    // public function bill()
    // {
    //     return $this->belongsTo(BillModel::class, 'id_h_orders');
    // }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressModel extends Model
{
    protected $table = "trans_d_orders";
    
    public function order()
    {
        return $this->belongsTo(OrderModel::class, 'id_h_orders');
    }
}

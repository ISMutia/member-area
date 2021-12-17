<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgressModel extends Model
{
    protected $table = 'trans_d_orders';

    protected $fillable = [
        'id_h_orders',
        'progress',
    ];

    public function order()
    {
        return $this->belongsTo(OrderModel::class, 'id_h_orders');
    }
}

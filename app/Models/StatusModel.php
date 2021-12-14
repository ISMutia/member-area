<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusModel extends Model
{
    protected $table = 'm_status';

    public function order()
    {
        return $this->belongsTo(OrderModel::class, 'id_h_orders', 'id');
    }

    // protected $fillable = ["name"];
}

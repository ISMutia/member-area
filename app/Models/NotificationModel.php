<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationModel extends Model
{
    protected $table = 'm_notification';

    protected $fillable = [
        'id_h_orders',
        'id_customers',
        'tittle',
        'description',
    ];

    public function order()
    {
        return $this->belongsTo(OrderModel::class, 'id_h_orders');
    }
    public function customer()
    {
        return $this->belongsTo(UserModel::class, 'id_customers', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillModel extends Model
{
    protected $table = 'm_bills';

    protected $fillable = [
        'id_h_orders',
        'bukti',
        'id_status',
        'total_bayar',
    ];

    public function order()
    {
        return $this->belongsTo(OrderModel::class, 'id_h_orders', 'id');
    }

    public function status()
    {
        return $this->belongsTo(StatusModel::class, 'id_status', 'id');
    }

    public function getBuktiUrlAttribute()
    {
        if ($this->bukti) {
            return asset('storage/bukti-pembayaran/'.$this->bukti);
        }

        return null;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    protected $table = 'trans_h_orders';

    protected $fillable = [
        'project_name',
        'id_price',
        'lama_p',
        'mulai_p',
        'selesai_p',
        'lama_domain',
        'id_domain',
        'id_customers',
        'name_domain',
        'link_group_wa',
    ];

    public function customer()
    {
        return $this->belongsTo(UserModel::class, 'id_customers', 'id');
    }

    public function domain()
    {
        return $this->belongsTo(DomainModel::class, 'id_domain', 'id');
    }

    public function price()
    {
        return $this->belongsTo(PriceModel::class, 'id_price', 'id');
    }

    public function bill()
    {
        return $this->belongsTo(BillModel::class, 'id', 'id_h_orders');
    }
}

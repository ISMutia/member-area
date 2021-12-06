<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DomainModel extends Model
{
    protected $table = 'm_domain';

    public function price()
    {
        return $this->belongsTo(PriceModel::class, 'id_price');
    }
}

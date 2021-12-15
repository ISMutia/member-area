<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestimoniModel extends Model
{
    protected $table = 'trans_h_testimonial';

    protected $fillable = [
        'id_customers',
        'status',
        'description',
    ];

    public function customer()
    {
        return $this->belongsTo(UserModel::class, 'id_customers', 'id');
    }
}

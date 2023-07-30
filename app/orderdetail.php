<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderdetail extends Model
{
    protected $fillable = [
        'order_id', 'products_id', 'quantity','unicost', 'total',
    ];
}

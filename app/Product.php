<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'supplier_id', 'product_name','product_code', 'product_price', 'product_cost','product_stock','description','main_image'
    ];

}

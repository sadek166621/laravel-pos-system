<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'category_id'=>$row[0],
            'supplier_id'=>$row[1],
            'product_name'=>$row[2],
            'product_code'=>$row[3],
            'product_price'=>$row[4],
            'product_cost'=>$row[5],
            'product_stock'=>$row[6],
            'description'=>$row[7],
            'main_image'=>$row[8],
        ]);
    }
}

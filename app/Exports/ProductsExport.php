<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::select('category_id','supplier_id','product_name','product_code','product_price','product_cost','product_stock','description','main_image')->get();
    }

}

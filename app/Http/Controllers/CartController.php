<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;
use Toastr;
use DB;

class CartController extends Controller
{
   public function incertcart(Request $request){

    $product = Product::find($request->Product_id);

   $data = Cart::add([
        'id' => $product->id,
        'name' => $product->product_name,
        'price'=> $product->product_price,
        'qty' => 1,
        'weight'=>500,
        'options' => [
            'code' => $product->product_code,
            'image' => $product->main_image,
        ]
    ]);

    return response()->json(['status'=>'success',]);

   }

   public function cartupdate(Request $request){
    
    Cart::update(
        $request->rowId,$request->qty
        );

        return response()->json(['status'=>'success',]);
   }

   public  function removeCart($id){

    Cart:: remove($id);
    return response()->json(['status'=>'success',]);

}
}

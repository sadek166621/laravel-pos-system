<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function allorders(){
        $orders = DB::table('orders')
        ->join('customers','orders.customer_id', '=' , 'customers.id')
        ->select('orders.*','customers.name')
        ->orderby('orders.id','desc')
        ->get();
        return view('admin.orders.all-orders',compact('orders'));
     }
     public function vieworder($id){
        $customer = DB::table('orders')
        ->join('customers','orders.customer_id', '=' , 'customers.id')
        ->select('customers.name','customers.email','customers.address','customers.phone','orders.invoice_no','orders.payment_status','orders.order_date')
        ->where('orders.id',$id)
        ->first();
        $order = DB::table('orders')->where('id',$id)->first();
        $data = DB::table('orderdetails')
        ->join('products','orderdetails.products_id','=','products.id')
        ->select('products.product_name','products.main_image','orderdetails.quantity','orderdetails.unicost','orderdetails.total')
        ->where('orderdetails.order_id',$id)
        ->get();
        return view('admin.orders.view-orders',compact('data','order','customer'));
     }
     public function dueorders(){
        return view('admin.orders.due-orders');
     }
}

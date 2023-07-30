<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\customer;
use Toastr;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\order;
use App\orderdetail;
use App\Product;
use Session;


class PosController extends Controller
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

     public function pos(){
        $categories = DB::table('categories')->get();
        $cartItems = Cart::content();
        $customers = DB::table('customers')->orderby('id','desc')->get();
        $allPublishedProducts = DB::table('products')
        ->join('categories','products.category_id', '=' , 'categories.id')
        ->select('categories.cat_name','products.*')
        ->orderby('products.id','desc')
        ->get();
        return view('admin.pos.pos',compact('allPublishedProducts','customers','cartItems','categories'));
     }

     public function poscustomer(Request $request){
        $this->validate($request, [

            'name' => 'required|max:255',
            'email' => 'unique:employeers|max:50',
            'phone' => 'required|numeric|digits:11',
            'address' => 'required|',
            'photo' => 'required|',
        ]);


        $customers = new customer();
        $customers->name = $request->name;
        $customers->email = $request->email;
        $customers->phone = $request->phone;
        $customers->address = $request->address;
        $customers->photo = $this->saveImageInfo($request);
        $customers->nid = $request->nid;
        $customers->city = $request->city;
        $customers->save();
        Toastr::success('New Customer Add Successfully', '', ["positionClass" => "toast-top-right"]);
        return back();
     }

     private function saveImageInfo($request){

        $mainImage=$request->file('photo');
        $mainImageName=$mainImage->getClientOriginalName();
        $uploadPath='image/Customer/customer_image/';
        $mainImageUrl=$uploadPath.$mainImageName;
        $mainImage->move($uploadPath,$mainImageName);
        return $mainImageUrl;

    }

    public function showcatpro($id){
        $categories = DB::table('categories')->get();
        $cartItems = Cart::content();
        $customers = DB::table('customers')->orderby('id','desc')->get();
        $allPublishedProducts = DB::table('products')
        ->join('categories','products.category_id', '=' , 'categories.id')
        ->select('categories.cat_name','products.*')
        ->where('products.category_id',$id)
        ->get();
        return view('admin.pos.pos',compact('allPublishedProducts','categories','customers','cartItems'));
    }

    public function invoice(Request $request){
        $this->validate($request, [
            'cus_id' => 'required|',
        ],
        [
            'cus_id.required' => 'Please Select Customer Name !'
        ]);
        $data = $request->cus_id;
        $customer = DB::table('customers')->where('id', $data)->first();
        $cart = Cart::content();

        return view('admin.pos.invoice',compact('customer','cart'));
    }

    public function finalinvoice(Request $request){

        $data = new order();
        $data -> customer_id = $request->customer_id;
        $data -> order_date = $request->order_date;
        $data -> order_status = $request->order_status;
        $data -> total_products = $request->total_products;
        $data -> sub_total = $request->sub_total;
        $data -> vat = $request->vat;
        $data -> total = $request->total;
        $data -> payment_status = $request->payment_status;
        $data -> pay = $request->pay;
        $data -> due = $request->due;
        $data -> invoice_no = $request->invoice_no;
        $data -> save();
        $orderId= $data->id;
        session::put('orderId',$orderId);

        $products = Cart::content();
        foreach ($products as $product){
            $orderDetail= new orderdetail();
            $orderDetail->order_id = Session::get('orderId');
            $orderDetail->products_id = $product->id;
            $orderDetail->quantity = $product->qty;
            $orderDetail->unicost = $product->price;
            $orderDetail->total = $product->subtotal;
            $orderDetail->save();

        }

        // -----Stock Managment ----

         $orderDetails = orderdetail::where('order_id', Session::get('orderId'))->get();
        foreach ($orderDetails as $orderProduct) {
            $product_id = $orderProduct->products_id;
            $productById = Product::find($product_id);
            $productById->product_stock=$productById->product_stock - $orderProduct->quantity;
            $productById->save();
        }

        // ----- End Stock Managment ---

        Cart::destroy();
        Toastr::success('Done', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect('pos');

        }
}

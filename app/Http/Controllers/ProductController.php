<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use App\ProductSubImage;
use App\SubCategory;
use App\suppliers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Toastr;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;


class ProductController extends Controller
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



    public function addProduct(){
        $categories = Category::all();
        $supplier = suppliers::all();

        return view('admin.product.add-product',[
            'categories'=>$categories,
            'suppliers'=>$supplier

        ]);
    }

    private function savebasicproductInfo(Request $request){
//        return $request;
        $this->validate($request, [
            'category_id' => 'required|',
            'supplier_id' => 'required|',
            'product_name' => 'required|',
            'product_code' => 'required|unique:products|',
            'product_price' => 'required|',
            'product_cost' => 'required|',
            'product_stock' => 'required|',
            'description' => 'required|',
        ]);
        $product = new Product();
        $product->category_id= $request->category_id;
        $product->supplier_id= $request->supplier_id;
        $product->product_name= $request->product_name;
        $product->product_code= $request->product_code;
        $product->product_price= $request->product_price;
        $product->product_cost= $request->product_cost;
        $product->product_stock= $request->product_stock;
        $product->description= $request->description;
        $product->main_image= $this->saveMainProductInfo($request);
        $product->save();
        Toastr::success('New Product Add Successfully', '', ["positionClass" => "toast-top-right"]);
        return redirect()->to('/manage-product')->send();

    }


    private function saveMainProductInfo($request){
        $this->validate($request, [
            'main_image' => 'required|image|mimes:jpeg,png,jpg,JPG,gif,svg|max:20480'
        ]);
        $mainImage=$request->file('main_image');
        $mainImageName=$mainImage->getClientOriginalName();
        $uploadPath='image/product/main_image/';
        $mainImageUrl=$uploadPath.$mainImageName;
        $mainImage->move($uploadPath,$mainImageName);
        return $mainImageUrl;
    }

    private function uploadProductImage($request, $product_id) {
        if($files=$request->file('sub_image')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $uploadPath='image/product/sub_image/';
                $imageUrl=$uploadPath.$name;
                $file->move($uploadPath,$name);
                $productSubImage = new ProductSubImage();
                $productSubImage->product_id = $product_id;
                $productSubImage->sub_image = $imageUrl;
                $productSubImage->save();
            }
        }
    }

    public function saveProduct(Request $request){
        $productId = $this->savebasicproductInfo($request);
        $this->uploadProductImage($request, $productId);
        return redirect('/add-product')->with('message','Product save Successfully');
    }

    public function manageProduct() {
        $allPublishedProducts = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            // ->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
            ->select('products.id', 'products.product_name','products.product_price', 'products.product_cost','products.product_stock','products.main_image', 'categories.cat_name')
             //->where('products.publication_status','=',1)
             ->orderBy('products.id', 'desc')
            ->get();
            // return $allPublishedProducts;
        return view('admin.product.manage-product', ['allPublishedProducts'=>$allPublishedProducts]);
    }

    public function viewProductInfo($id) {

        $productById = DB::table('products')
        ->join('categories','products.category_id', '=' , 'categories.id')
        ->join('suppliers','products.supplier_id', '=' ,'suppliers.id')
        ->select('categories.id','suppliers.id','categories.cat_name','suppliers.name','products.*')
        ->where('products.id', $id)
        ->first();

        return view('admin.product.view-product', [
            'productById' => $productById,
        ]);
    }

    public function editProductInfo($id) {
        $categories=Category::all();
        $suppliers=suppliers::all();
        $productById = Product::find($id);

        return view('admin.product.edit-product', [
            'categories'=>$categories,
            'suppliers'=>$suppliers,
            'productById' => $productById,
        ]);
    }
    private function updateProductBasicInfo($request) {
        $product = Product::find($request->product_id);
        $product->category_id= $request->category_id;
        $product->supplier_id= $request->supplier_id;
        $product->product_name= $request->product_name;
        $product->product_code= $request->product_code;
        $product->product_price= $request->product_price;
        $product->product_cost= $request->product_cost;
        $product->product_stock= $request->product_stock;
        $product->description= $request->description;
        if($request->main_image) {
            unlink($product->main_image);
            $product->main_image = $this->saveMainProductInfo($request);
        }

        Toastr::success('New Product Add Successfully', '', ["positionClass" => "toast-top-right"]);
        $product->save();
    }


    public function updateProductInfo(Request $request) {
        $this->updateProductBasicInfo($request);
        if($request->sub_image) {
            $productSubImages = ProductSubImage::where('product_id', $request->product_id)->get();
            foreach ($productSubImages as $productSubImage) {
                unlink($productSubImage->sub_image);
                $productSubImage->delete();
            }
            $this->uploadProductImage($request, $request->product_id);
        }
        return redirect('/manage-product');
    }

    public function deleteProductInfo($id) {
        $productById = Product::find($id);
        $productById->delete();
        unlink($productById->main_image  );
        $productSubImages = ProductSubImage::where('product_id', $id)->get();

        foreach ($productSubImages as $productSubImage){
            $productSubImage->delete();
            unlink($productSubImage->sub_image);
        }

        return redirect('/manage-product')->with('message', 'Product info delete successfully');
    }


    public function importproduct(){
        return view('admin.product.import-product');
    }

    public function export()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');

    }

    public function import(Request $request){

      $import =  Excel::import(new ProductsImport, $request->file('main_image'));

      if( $import){
        Toastr::success('Import Products Successfully', '', ["positionClass" => "toast-top-right"]);
        return redirect('/manage-product');
      }
    }

}

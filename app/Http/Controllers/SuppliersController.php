<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\suppliers;
use Toastr;
use DB;

class SuppliersController extends Controller
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


    public function addsuppliers(){
        return view('admin.suppliers.add-suppliers');
    }

    public function incertsuppliers(Request $request){
        $this->validate($request, [

            'name' => 'required|max:255',
            'email' => 'unique:employeers|max:30',
            'phone' => 'required|numeric|digits:11',
            'address' => 'required|',
            'type' => 'required|',
            'shop' => 'required|',
            'city' => 'required|',
        ]);


        $suppliers = new suppliers();
        $suppliers->name = $request->name;
        $suppliers->email = $request->email;
        $suppliers->phone = $request->phone;
        $suppliers->address = $request->address;

        if($request->photo)
        $suppliers->photo = $this->saveImageInfo($request);
        else
        $suppliers->photo = 'image/suppliers/suppliers_image/imagesfornull.png';

        $suppliers->type = $request->type;
        $suppliers->shop = $request->shop;
        $suppliers->city = $request->city;
        $suppliers->save();
        Toastr::success('New suppliers Add Successfully', '', ["positionClass" => "toast-top-right"]);
        return redirect('/manage-suppliers');

    }

    private function saveImageInfo($request){

        $mainImage=$request->file('photo');
        $mainImageName=$mainImage->getClientOriginalName();
        $uploadPath='image/suppliers/suppliers_image/';
        $mainImageUrl=$uploadPath.$mainImageName;
        $mainImage->move($uploadPath,$mainImageName);
        return $mainImageUrl;

    }

    public function managesuppliers(){
        $suppliers = DB::table('suppliers')->get();
        return view('admin.suppliers.manage-suppliers', compact('suppliers'));
    }


    public function editsuppliers($id){
        $suppliers = DB::table('suppliers')->where('id',$id)->first();
        return view('admin.suppliers.edit-suppliers',[
            'suppliers' =>  $suppliers
        ]);
    }

    public function updatesuppliers(Request $request){

        $Image = $request->file('photo');
        if($Image){
            $row = suppliers::find($request->id);
            unlink($row->photo);
            $imageUrl = $this->updateImage($Image);
            $this->updateBasicInfo($request,$imageUrl);
        }else{
            $this->updateBasicInfo($request);
        }

        Toastr::success(' suppliers Update Successfully', ' ', ["positionClass" => "toast-top-right"]);
        return redirect('/manage-suppliers');

    }

    private function updateBasicInfo($request, $imageUrl=null){

        $suppliers = suppliers::find($request->id);
       $suppliers->name = $request->name;
        $suppliers->email = $request->email;
        $suppliers->phone = $request->phone;
        $suppliers->address = $request->address;

        if($imageUrl) {
            $suppliers->photo = $imageUrl;
        }
        $suppliers->type = $request->type;
        $suppliers->shop = $request->shop;
        $suppliers->city = $request->city;
        $suppliers->save();
    }

    private function updateImage($mainImage) {
        $mainImageName=$mainImage->getClientOriginalName();
        $uploadPath='image/suppliers/suppliers_image/';
        $mainImageUrl=$uploadPath.$mainImageName;
        $mainImage->move($uploadPath,$mainImageName);
        return $mainImageUrl;
    }

    public function deletesuppliers($id){
        $employeer = suppliers::find($id);
        $employeer->delete();
        Toastr::success(' suppliers Delete Successfully', '', ["positionClass" => "toast-top-right"]);
        return redirect('/manage-suppliers');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
use Toastr;
use DB;

class CustomerController extends Controller
{
    public function addcustomer(){
        return view('admin.customer.add-customer');
    }

    public function incertcustomer(Request $request){
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

    public function managecustomer(){
        $customers = DB::table('customers')->get();
        return view('admin.customer.manage-customer', compact('customers'));
    }


    public function editcustomer($id){
        $customer = DB::table('customers')->where('id',$id)->first();
        return view('admin.customer.edit-customer',[
            'customers' =>  $customer
        ]);
    }

    public function updatecustomer(Request $request){
        $Image = $request->file('photo');
        if($Image){
            $row = customer::find($request->id);
            unlink($row->photo);
            $imageUrl = $this->updateImage($Image);
            $this->updateBasicInfo($request,$imageUrl);
        }else{
            $this->updateBasicInfo($request);
        }

        Toastr::success(' Customer Update Successfully', ' ', ["positionClass" => "toast-top-right"]);
        return redirect('/manage-customer');

    }

    private function updateBasicInfo($request, $imageUrl=null){

        $customers = customer::find($request->id);
       $customers->name = $request->name;
        $customers->email = $request->email;
        $customers->phone = $request->phone;
        $customers->address = $request->address;
        if($imageUrl) {
            $customers->photo = $imageUrl;
        }
        $customers->nid = $request->nid;
        $customers->city = $request->city;
        $customers->save();
    }

    private function updateImage($mainImage) {
        $mainImageName=$mainImage->getClientOriginalName();
        $uploadPath='image/Customer/customer_image/';
        $mainImageUrl=$uploadPath.$mainImageName;
        $mainImage->move($uploadPath,$mainImageName);
        return $mainImageUrl;
    }

    public function deletecustomer($id){
        $employeer = customer::find($id);
        $employeer->delete();
        Toastr::success(' Customer Delete Successfully', '', ["positionClass" => "toast-top-right"]);
        return redirect('/manage-customer');

    }

}

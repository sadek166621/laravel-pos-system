<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\employeer;
use Toastr;
use DB;
class EmployeersController extends Controller
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


    public function addemployeers(){
        return view('admin.employeers.add-employeers');
    }

    public function incertemployeer(Request $request){

        $this->validate($request, [

            'name' => 'required|max:255',
            'email' => 'required|unique:employeers|max:30',
            'phone' => 'required|numeric|digits:11',
            'address' => 'required|',
            'experience' => 'required|',
            'photo' => 'required|',
            'salary' => 'required|numeric',
            'vacation' => 'required|',
            'city' => 'required|',
        ]);


        $employeers = new employeer();
        $employeers->name = $request->name;
        $employeers->email = $request->email;
        $employeers->phone = $request->phone;
        $employeers->address = $request->address;
        $employeers->experience = $request->experience;
        $employeers->photo = $this->saveImageInfo($request);
        $employeers->salary = $request->salary;
        $employeers->vacation = $request->vacation;
        $employeers->city = $request->city;
        $employeers->save();
        Toastr::success('New Employeer Add Successfully', '', ["positionClass" => "toast-top-right"]);
        return redirect('/manage-employeers');

    }

    private function saveImageInfo($request){

        $mainImage=$request->file('photo');
        $mainImageName=$mainImage->getClientOriginalName();
        $uploadPath='image/Employeer/employeer_image/';
        $mainImageUrl=$uploadPath.$mainImageName;
        $mainImage->move($uploadPath,$mainImageName);
        return $mainImageUrl;
    }

    public function manageemployeers(){
        $employeers= employeer::orderby('id','desc')->get();
        return view('admin.employeers.manage-employeer',compact('employeers'));
    }
    public function editemployeer($id){
        $employeer = DB::table('employeers')->where('id',$id)->first();
        return view('admin.employeers.edit-employeer',[
            'employeer' =>  $employeer
        ]);
    }
    public function updateemployeer(Request $request){
        $EmployeerImage = $request->file('photo');
        if($EmployeerImage){
            $employeer = employeer::find($request->id);
            unlink($employeer->photo);
            $imageUrl = $this->updateemployeerImage($EmployeerImage);
            $this->updateEmployeerBasicInfo($request,$imageUrl);
        }else{
            $this->updateEmployeerBasicInfo($request);
        }

        Toastr::success(' Employeer Update Successfully', ' ', ["positionClass" => "toast-top-right"]);
        return redirect('/manage-employeers');

    }

    private function updateEmployeerBasicInfo($request, $imageUrl=null){

        $employeers = employeer::find($request->id);
       $employeers->name = $request->name;
        $employeers->email = $request->email;
        $employeers->phone = $request->phone;
        $employeers->address = $request->address;
        $employeers->experience = $request->experience;
        if($imageUrl) {
            $employeers->photo = $imageUrl;
        }
        $employeers->salary = $request->salary;
        $employeers->vacation = $request->vacation;
        $employeers->city = $request->city;
        $employeers->save();
    }

    private function updateemployeerImage($mainImage) {
        $mainImageName=$mainImage->getClientOriginalName();
        $uploadPath='image/Employeer/employeer_image/';
        $mainImageUrl=$uploadPath.$mainImageName;
        $mainImage->move($uploadPath,$mainImageName);
        return $mainImageUrl;
    }

    public function viewemployeer($id){
        $employeer = DB::table('employeers')->where('id',$id)->first();
        return view('admin.employeers.view-employeers', compact('employeer'));
    }

    public function deleteemployeer($id){
        $employeer = employeer::find($id);
        $employeer->delete();
        Toastr::success(' Employeer Delete Successfully', '', ["positionClass" => "toast-top-right"]);
        return redirect('/manage-employeers');

    }

}

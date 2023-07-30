<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\employeer;
use App\attendance;
use Toastr;
use DB;

class AttendanceController extends Controller
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


    public function addattendance(){
        $attendace = employeer::all();
        return view('admin.attendance.add-attendance',compact('attendace'));
    }

    public function insertattendance(Request $request){

        $attendance = DB::table('attendances')->where('date',$request->date)->first();

        if($attendance){

            Toastr::error('Todays Attendance Taken Already', '', ["positionClass" => "toast-top-right"]);
            return back();

        }
        else{

            foreach($request->emp_id as $id){
                $data[]= [
                "emp_id" => $id,
                "attendance" => $request->attendance[$id],
                "date" => $request->date,
                "year" => $request->year,
                "month" => $request->month,

                ];
            }

          $att = DB::table('attendances')->insert($data);
          if($att){

            Toastr::success('New Attendance take Successfully', '', ["positionClass" => "toast-top-right"]);
            return redirect('/manage-attendance');
          }


        };
    }

    public function manageattendance(){
        $date = Date('d/m/Y');
        $Attendances = DB::table('attendances')
        ->join('employeers', 'attendances.emp_id', '=', 'employeers.id')
        ->select('employeers.name','employeers.photo','attendances.*')
        ->where('attendances.date',$date)
        ->get();
        return view('admin.attendance.manage-attendance',compact('Attendances'));
    }

    public function editattendance($id){
        $Attendances = DB::table('attendances')
        ->join('employeers', 'attendances.emp_id', '=', 'employeers.id')
        ->select('employeers.name','employeers.photo','attendances.*')
        ->where('attendances.id',$id)
        ->get();
        return view('admin.attendance.edit-attendance',[
            'attendace'=> $Attendances
        ]);

    }


    public function updateattendance(Request $request ){
        $attendance=attendance::find($request->id);
        $attendance->attendance = $request->attendance;
        $attendance->save();
        Toastr::success('Update attendance Successfully', '', ["positionClass" => "toast-top-right"]);
        return redirect('/manage-attendance');
        }


        public function viewattendance($emp_id){
         $Attendances = DB::table('attendances')->where('emp_id',$emp_id)->orderby('id','desc')->get();
         $data = DB::table('attendances')
         ->join('employeers', 'attendances.id', '=', 'employeers.id')
         ->select('employeers.name','employeers.photo')
         ->where('attendances.emp_id',$emp_id)
         ->first();

            return view('admin.attendance.view-attendance',[
                'Attendances'=>$Attendances,
                'data'=>$data
            ]);
        }


}

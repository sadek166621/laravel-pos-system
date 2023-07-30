<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\expense;
use DB;
use Toastr;
class ExpenseController extends Controller
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


     public function addexpense(){
        return view('admin.expense.add-expense');
     }

     public function incertexpense(Request $request){

        $this->validate($request, [

            'details' => 'required|',
            'amount' => 'required|',
        ]);

        $date = new expense();
        $date ->details = $request->details;
        $date ->amount = $request->amount;
        $date ->month = $request->month;
        $date ->date = $request->date;
        $date ->year = $request->year;
        $date->save();
        Toastr::success('New Expense Add Successfully', '', ["positionClass" => "toast-top-right"]);
        return redirect('/today-expense');
     }


     public function allexpense(){

        $expenses = expense::all();

        return view('admin.expense.all-expense', compact('expenses'));
     }


     public function editexpense($id){
        $expense = DB::table('expenses')->where('id',$id)->first();
        return view('admin.expense.edit-expense', compact('expense'));
     }


      public function updateexpense(Request $request){

       $expense = expense::find($request->id);

        $expense ->details = $request->details;
        $expense ->amount = $request->amount;
        $expense->save();
        Toastr::success('Expense Update Successfully', '', ["positionClass" => "toast-top-right"]);
        return redirect('/all-expense');
      }

      public function deleteexpense($id){

        $expense = expense::find($id);
        $expense->delete();
        Toastr::success('Expense Delete Successfully', '', ["positionClass" => "toast-top-right"]);
        return redirect('/all-expense');


      }

      public function todayexpense(){
        $date = \Carbon\Carbon::now()->format('d.m.Y');
        $expenses = DB::table('expenses')->where('date',$date)->get();

        return view('admin.expense.today-expense', compact('expenses'));
      }


      public function monthexpense(){
        $month = date('F');
        $year = date('Y');
        $expenses = DB::table('expenses')->where('month',$month)->where('year',$year,)->get();
        return view('admin.expense.month-expense',compact('expenses'));
      }

      public function janexpense(){
        $month = 'January' ;
        $year = date('Y');
        $expenses = DB::table('expenses')->where('month',$month)->where('year',$year,)->get();
        return view('admin.expense.month-expense',compact('expenses'));
      }
      public function febexpense(){
        $month = 'February' ;
        $year = date('Y');
        $expenses = DB::table('expenses')->where('month',$month)->where('year',$year,)->get();
        return view('admin.expense.month-expense',compact('expenses'));
      }
      public function marexpense(){
        $month = 'March' ;
        $year = date('Y');
        $expenses = DB::table('expenses')->where('month',$month)->where('year',$year,)->get();
        return view('admin.expense.month-expense',compact('expenses'));
      }
      public function aplexpense(){
        $month = 'April' ;
        $year = date('Y');
        $expenses = DB::table('expenses')->where('month',$month)->where('year',$year,)->get();
        return view('admin.expense.month-expense',compact('expenses'));
      }
      public function mayexpense(){
        $month = 'May' ;
        $year = date('Y');
        $expenses = DB::table('expenses')->where('month',$month)->where('year',$year,)->get();
        return view('admin.expense.month-expense',compact('expenses'));
      }
      public function junexpense(){
        $month = 'June' ;
        $year = date('Y');
        $expenses = DB::table('expenses')->where('month',$month)->where('year',$year,)->get();
        return view('admin.expense.month-expense',compact('expenses'));
      }
      public function julyexpense(){
        $month = 'July' ;
        $year = date('Y');
        $expenses = DB::table('expenses')->where('month',$month)->where('year',$year,)->get();
        return view('admin.expense.month-expense',compact('expenses'));
      }
      public function augexpense(){
        $month = 'August' ;
        $year = date('Y');
        $expenses = DB::table('expenses')->where('month',$month)->where('year',$year,)->get();
        return view('admin.expense.month-expense',compact('expenses'));
      }
      public function sepexpense(){
        $month = 'September' ;
        $year = date('Y');
        $expenses = DB::table('expenses')->where('month',$month)->where('year',$year,)->get();
        return view('admin.expense.month-expense',compact('expenses'));
      }
      public function octexpense(){
        $month = 'October' ;
        $year = date('Y');
        $expenses = DB::table('expenses')->where('month',$month)->where('year',$year,)->get();
        return view('admin.expense.month-expense',compact('expenses'));
      }
      public function novexpense(){
        $month = 'November ' ;
        $year = date('Y');
        $expenses = DB::table('expenses')->where('month',$month)->where('year',$year,)->get();
        return view('admin.expense.month-expense',compact('expenses'));
      }
      public function decexpense(){
        $month = 'December' ;
        $year = date('Y');
        $expenses = DB::table('expenses')->where('month',$month)->where('year',$year,)->get();
        return view('admin.expense.month-expense',compact('expenses'));
      }

      public function yearexpense(){
        $year = date('Y');
        $expenses = DB::table('expenses')->where('year',$year,)->get();
        return view('admin.expense.year-expense',compact('expenses'));
      }

      public function oneyrexpense(){
        $year = date('Y',strtotime("-1 year"));
        $expenses = DB::table('expenses')->where('year',$year,)->get();
        return view ('admin.expense.-oneyear-expense',compact('expenses'));
      }

      public function twoyrexpense (){
        $year = date('Y',strtotime("-2 year"));
        $expenses = DB::table('expenses')->where('year',$year,)->get();
        return view ('admin.expense.-twoyear-expense',compact('expenses'));
      }





    }

<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Toastr;
use DB;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.add-category',[
            'categories'=> Category::orderby('id', 'desc')->get(),
        ]);
    }

    private function savebasiccategoryInfo(Request $request){
        $this->validate($request, [
            'category_name' => 'required|string|min:1',
        ]);
        $category = new Category();
        $category->cat_name= $request->category_name;
        $category->save();
        return back();
    }

    public function saveCategory(Request $request){
        $this->savebasiccategoryInfo($request);
        Toastr::success('New Category Add Successfully', '', ["positionClass" => "toast-top-right"]);
        return redirect('/add-category');
    }
    public function manageCategory(){
        $categories = Category::all();
        return view('admin.category.manage-category',[
            'categories' =>$categories
        ]);
    }
//

    public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();
        Toastr::success('Delete Category Successfully', '', ["positionClass" => "toast-top-right"]);
        return redirect('/add-category');
    }
      public function editCategory($id){
        $categoryById=Category::find($id);
        return view('admin.category.edit-category',[
            'category'=>$categoryById,
        ]);
    }
    public function updateCategory(Request $request) {
        $category=Category::find($request->id);
        $category->cat_name = $request->category_name;
        $category->save();
        Toastr::success('Update Category Successfully', '', ["positionClass" => "toast-top-right"]);
        return redirect('/add-category');
    }
}

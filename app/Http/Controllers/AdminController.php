<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    //creating category method on admin dashboard
    public function view_category(){
    $data=category::all();

        return view('admin.category',compact('data'));
    }

    //creating add category function
    public function add_category(Request $request){
        $data = new category; 
        $data->category_name = $request->category;

        $data->save();
        return redirect()->back()->with('message','Category Added Successfully');
    }

    public function delete_category($id){
        $data=category::find($id);
        $data->delete();

        return redirect()->back()->with('message','Category Deleted Successfully');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

use App\Models\Product;

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

    //deleting categories from database
    public function delete_category($id){
        $data=category::find($id);
        $data->delete();

        return redirect()->back()->with('message','Category Deleted Successfully');
    }

    //retrieving products from database
    public function view_product(){

        $category = category::all();
        return view('admin.product', compact('category'));
    }
    
    //adding data to the database for products
    public function add_product(Request $request){
        $product = new product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->discount = $request->discount;


        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product', $imagename);

        $product->image=$imagename;

        $product->save();
        return redirect()->back()->with('message','Product Added Successfully');
    }

    //retriving data from database for all products saved
    public function show_product(){
        $product = product::all();
        return view('admin.show_product', compact('product'));
    }

        //deleting products from database
    public function delete_product($id){
        $product=product::find($id);
        $product->delete();
    
        return redirect()->back()->with('message','Product Deleted Successfully');
    }

    //updating data of products from database
public function update_product($id){
    $product=product::find($id);
    $category = category::all();
    return view('admin.update_product', compact('product','category'));

    }
    //function for updating products data
    public function update_product_confirm(Request $request,$id){
    $product=product::find($id);
    $product->title = $request->title;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->discount = $request->discount;
    $product->quantity = $request->quantity;
    $product->category = $request->category;
    
    $image = $request->image;

    if($image){
    $imagename = time().'.'.$image->getClientOriginalExtension();
    $request->image->move('product', $imagename);

    $product->image=$imagename;
    }

    
    $product->save();
        return redirect()->back()->with('message','Product Updated Successfully');

    }


}

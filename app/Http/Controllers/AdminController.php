<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    //
    public function view_category()
    {
        $data = Category::all();

        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $category = new Category;

        $category->category_name = $request->category_name;

        $category->save();

        toastr()->timeOut(5000)->closeButton(true)->success('Category has been accepted.');

        return redirect()->back();
    }

    public function delete_category($id)
    {
        $data = Category::find($id);

        if ($data) {
            // Menghapus data
            $data->delete();

            // Notifikasi Toastr
            toastr()->timeOut(5000)->closeButton(true)->success('Category ' . $data->category_name . ' deleted successfully');
        } else {
            // Jika data tidak ditemukan
            toastr()->timeOut(5000)->closeButton(true)->error('Category not found');
        }

        return redirect()->back();
    }

    public function edit_category(Request $request)
    {
        $id = $request->id;
        
        $data = Category::find($id);

        return view('admin.edit_category', compact('data'));
    }

    public function update_category(Request $request, $id)
    {
        $data = Category::find($id);

        $data->category_name = $request->category_name;

        if ($data) {
            
            $data->save();

            // Notifikasi Toastr
            toastr()->timeOut(5000)->closeButton(true)->success('Category ' . $data->category_name . ' Update successfully');
        } else {
            // Jika data tidak ditemukan
            toastr()->timeOut(5000)->closeButton(true)->error('Category not found');
        }

        return redirect('/view_category');
    }

    public function add_product()
    {
        $category = Category::all();

        
        return view('admin.add_product', compact('category'));
    }

    public function upload_product(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png,gif,pdf',
        ]);

        $product = new Product;

        $product->title = $request->title;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        $product->description = $request->description;
       
        $image = $request->image;
        if($image){
            $imagename = time(). '.' . $image->getClientOriginalExtension();
            $request->image->move('product',$imagename);

            $product->image=$imagename;
        }
        
        $product->save();

        toastr()->timeOut(5000)->closeButton(true)->success('Product has been added.');

        return redirect()->back();
    }

    public function view_product()
    {
        $data = Product::all();

        return view('admin.product', compact('data'));
    }

    public function delete_product($id)
    {
        $data = Product::find($id);

        if ($data) {
            $image_path = public_path('product/'.$data->image);

            if(file_exists($image_path)){
                unlink($image_path);
            }


            // Menghapus data
            $data->delete();

           
            // Notifikasi Toastr
            toastr()->timeOut(5000)->closeButton(true)->success('Category ' . $data->title . ' deleted successfully');
        } else {
            // Jika data tidak ditemukan
            toastr()->timeOut(5000)->closeButton(true)->error('Category not found');
        }

        return redirect()->back();
    }

    public function edit_product(Request $request)
    {
        $id = $request->id;
        
        $data = Product::find($id);

        $category = Category::all();

        return view('admin.edit_product', compact('data'), compact('category'));
    }

    public function update_product(Request $request, $id)
    {
        $product = Product::find($id);

        $product->title = $request->title;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        $product->description = $request->description;

        $image = $request->image;

        if($image){
             //detele image in folder product
             $image_path = public_path('product/'.$product->image);

             if(file_exists($image_path)){
                 unlink($image_path);
             } 

            $imagename = time(). ' . ' .$image->getClientOriginalExtension();
            $request->image->move('product', $imagename);

            $product->image = $imagename;

           
        }

        if ($product) {
            
            $product->save();

            // Notifikasi Toastr
            toastr()->timeOut(5000)->closeButton(true)->success('Product ' . $product->title . ' Update successfully');
        } else {
            // Jika data tidak ditemukan
            toastr()->timeOut(5000)->closeButton(true)->error('Product not found');
        }

        return redirect('/view_product');
    }

    public function product_search(Request $request) {

        $search = $request->search;

        $data = product::search($search);

        return view('admin.product', compact('data'));
    }

    public function view_order()
    {
        $data = Order::all();

        return view('admin.order', compact('data'));
    }

    public function perjalanan($id)
    {
        $data = Order::find($id);
        $data->status = "Perjalanan";

        $data->save();

        return redirect('/view_order');
    }

    public function dikirim($id)
    {
        $data = Order::find($id);
        $data->status = "Berhasil Dikirim";

        $data->save();

        return redirect('/view_order');
    }
}

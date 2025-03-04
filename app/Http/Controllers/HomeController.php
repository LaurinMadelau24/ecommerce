<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function home()
    {
        $data = Product::all();

        if (Auth::id() != null) {

            $user = Auth::user();
            $user_id = $user->id;

            $count = Cart::where('user_id', $user_id)->count();
        } else {
            $count = "";
        }

        return view('home.index', compact('data', 'count'));
    }

    public function login_home()
    {

        $data = Product::all();

        $user = Auth::user();
        $user_id = $user->id;

        $count = Cart::where('user_id', $user_id)->count();

        return view('home.index', compact('data', 'count'));
        // print_r($count);
    }

    public function detail_product($id)
    {
        if (Auth::id() != null) {

            $user = Auth::user();
            $user_id = $user->id;

            $count = Cart::where('user_id', $user_id)->count();
        } else {
            $count = "";
        }

        $data = Product::find($id);

        return view('home.detail_product', compact('data','count'));
    }

    public function add_cart($id)
    {
        $product_id = $id;

        $user = Auth::user();

        $user_id = $user->id;

        $data = new Cart;
        $data->user_id = $user_id;
        $data->product_id = $product_id;

        $data->save();

        toastr()->timeOut(5000)->closeButton(true)->success('Product has been added.');

        return redirect()->back();



        // return view('home.detail_product', compact('user'));
    }

    public function mycart(){

        if (Auth::id() != null) {

            $user = Auth::user();
            $user_id = $user->id;

            $count = Cart::where('user_id', $user_id)->count();
            $cart = Cart::where('user_id', $user_id)->get();


        } else {
            $count = "";
        }

        return view('home.mycart', compact('count','cart'));
    }

    public function delete_cart($id)
    {
        $data = Cart::find($id);

 

        if ($data) {


            // Menghapus data
            $data->delete();

           
            // Notifikasi Toastr
            toastr()->timeOut(5000)->closeButton(true)->success('Data ' . $data->title . ' deleted successfully');
        } else {
            // Jika data tidak ditemukan
            toastr()->timeOut(5000)->closeButton(true)->error('Category not found');
        }

        return redirect()->back();
    }

    public function comfirm_order(Request $request){

        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $userid = Auth::user()->id;
        $cart = Cart::where('user_id', $userid)->get();

        foreach($cart as $carts){
            $order = new Order;
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            $order->product_id = $carts->product_id;

            $order->save();        
        }

        $cart_remove = Cart::where('user_id',$userid)->get();

        foreach($cart_remove as $remove){
            $data = Cart::find($remove->id);

            $data->delete();
        }

        toastr()->timeOut(5000)->closeButton(true)->success('Data ' . $data->title . ' successfully');

        return redirect()->back();
    }
}

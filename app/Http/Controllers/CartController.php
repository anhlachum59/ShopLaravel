<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;
use Cart;

class CartController extends Controller
{
    public function save_cart(Request $request)
    {
       
        $productId = $request->productid_hidden;
        $quantity = $request->qty;

        $product_info = DB::table('tbl_product')->where('product_id',$productId)->first();
        
        $data['id'] = $product_info->product_id; 
        $data['qty'] = $quantity; 
        $data['name'] = $product_info->product_name; 
        $data['price'] = $product_info->product_price; 
        $data['weight'] = $product_info->product_price; 
        $data['options']['image'] = $product_info->product_image; 
        Cart::add($data);

        return Redirect::to('/show-cart');
    }
    public function show_cart()
    {
        $banner = DB::table('tbl_banner')->where('banner_status','0')->orderby('banner_id','desc')->get();
        $cate_product=DB::table('tbl_category_product')->where('category_status','0')
        ->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand')->where('brand_status','0')
        ->orderby('brand_id','desc')->get(); 

        return view('fontend.cart.show_cart')->with('category',$cate_product)
        ->with('brand',$brand_product)
        ->with('banner',$banner); 
    }
    public function delete_to_cart($rowId)
    {
        Cart::update($rowId,0);
        return Redirect::to('/show-cart');
    }
    public function update_cart_quantity(Request $request)
    {
        $rowId = $request->rowId_cart;
        $quantity = $request->cart_quantity;
        Cart::update($rowId,$quantity);
        return Redirect::to('/show-cart');
    }
}

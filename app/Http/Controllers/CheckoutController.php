<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;


class CheckoutController extends Controller
{
    public function login_checkout()
    {
        $cate_product=DB::table('tbl_category_product')->where('category_status','0')
        ->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand')->where('brand_status','0')
        ->orderby('brand_id','desc')->get();
        return view('fontend.checkout.login_checkout')->with('category',$cate_product)
        ->with('brand',$brand_product);
    }
    public function add_customer(Request $request)
    {
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = $request->customer_password;
        $data['customer_phone'] = $request->customer_phone;

        $customer_id = DB::table('tbl_customer')->insertGetId($data);

        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);
        
        return Redirect('/checkout');
    }
    public function checkout()
    {

    }
}

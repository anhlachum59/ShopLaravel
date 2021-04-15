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


class CheckoutController extends Controller
{
    public function login_checkout()
    {
        $banner = DB::table('tbl_banner')->where('banner_status','0')->orderby('banner_id','desc')->get();
        $cate_product=DB::table('tbl_category_product')->where('category_status','0')
        ->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand')->where('brand_status','0')
        ->orderby('brand_id','desc')->get();
        return view('fontend.checkout.login_checkout')->with('category',$cate_product)
        ->with('brand',$brand_product)
        ->with('banner',$banner);
    }
    public function add_customer(Request $request)
    {
        if($request->customer_name == "" || $request->customer_email=="" 
        || $request->customer_password =="" || $request->customer_phone ==""
        || $request->comfirm_password =="")
        {
            Session::put('message1','Bạn chưa nhập tên của bạn');
            Session::put('message2','Bạn chưa nhập email của bạn');
            Session::put('message3','Bạn chưa nhập mật khẩu của bạn');
            Session::put('message4','Bạn chưa nhập số điện thoại của bạn');
            Session::put('message5','Bạn chưa nhập mật khẩu xác nhận');
            return Redirect('/login-checkout');
        } 
        elseif($request->customer_password != $request->comfirm_password)
        {
            Session::put('message','Mật khẩu xác nhận và mật khẩu không giống nhau');
            return Redirect('/login-checkout');
        }
       
        else{
            $data = array();
            $data['customer_name'] = $request->customer_name;
            $data['customer_email'] = $request->customer_email;
            $data['customer_password'] = md5($request->customer_password);
            $data['customer_phone'] = $request->customer_phone;
            $customer_id = DB::table('tbl_customer')->insertGetId($data);
            Session::put('customer_id',$customer_id);
            Session::put('customer_name',$request->customer_name); 
            return Redirect('/');
        }
    }
    
    public function checkout()
    {
        $banner = DB::table('tbl_banner')->where('banner_status','0')->orderby('banner_id','desc')->get();
        $cate_product=DB::table('tbl_category_product')->where('category_status','0')
        ->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand')->where('brand_status','0')
        ->orderby('brand_id','desc')->get();
        return view('fontend.checkout.show_checkout')->with('category',$cate_product)
        ->with('brand',$brand_product)
        ->with('banner',$banner);
    }
    public function save_checkout_customer(Request $request)
    {
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_notes'] = $request->shipping_notes;
        $data['shipping_address'] = $request->shipping_address;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);
        Session::put('shipping_id',$shipping_id);
   
        return Redirect('/payment');
    }
    public function payment()
    {
        $banner = DB::table('tbl_banner')->where('banner_status','0')->orderby('banner_id','desc')->get();
        $cate_product=DB::table('tbl_category_product')->where('category_status','0')
        ->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand')->where('brand_status','0')
        ->orderby('brand_id','desc')->get();

        return view('fontend.checkout.payment')->with('category',$cate_product)
        ->with('brand',$brand_product)
        ->with('banner',$banner);
    }

    public function order(Request $request)
    {
        //insert payment method
        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Đang chờ xử lý';
        $payment_id = DB::table('tbl_payment')->insertGetId($data);
        
        //insert order
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 'Đang chờ xử lý';
        $order_id = DB::table('tbl_order')->insertGetId($order_data);
   
        //insert order details
        $content = Cart::content();
        foreach($content as $v_content)
        {
            $order_details_data = array();
            $order_details_data['order_id'] = $order_id;
            $order_details_data['product_id'] = $v_content->id;
            $order_details_data['product_name'] = $v_content->name;
            $order_details_data['product_price'] = $v_content->price;
            $order_details_data['product_sales_quantity'] = $v_content->qty;
            DB::table('tbl_order_details')->insert($order_details_data);
        }
        if($data['payment_method']==1)
        {
            echo 'ATM';
        }
        elseif($data['payment_method']==2)
        {
            Cart::destroy();
            $banner = DB::table('tbl_banner')->where('banner_status','0')->orderby('banner_id','desc')->get();
            $cate_product=DB::table('tbl_category_product')->where('category_status','0')
            ->orderby('category_id','desc')->get();
            $brand_product=DB::table('tbl_brand')->where('brand_status','0')
            ->orderby('brand_id','desc')->get();
            return view('fontend.checkout.handcash')->with('category',$cate_product)
            ->with('brand',$brand_product)
            ->with('banner',$banner);
        }

      

        //return Redirect('/payment');
    }

    public function logout_checkout()
    {
        Session::flush();
        return Redirect('/login-checkout');
    }
    public function login(Request $request)
    {
        $email = $request->email_account;
        $password = md5($request->password_account);
      
        $result = DB::table('tbl_customer')->where('customer_email',$email)->where('customer_password',$password)->first();
        if($result)
        {
            Session::put('customer_id',$result->customer_id);
            Session::put('customer_name',$result->customer_name); 
            return Redirect('/');
        }
        else
        {
            Session::put('message7','Tài khoản hoặc mật khẩu sai');
            return Redirect('/login-checkout');
        }
    }
}

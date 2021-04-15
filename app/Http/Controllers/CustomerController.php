<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
class CustomerController extends Controller
{
    public function customer_info(Request $request)
    {
        $banner = DB::table('tbl_banner')->where('banner_status','0')->orderby('banner_id','desc')->get();
        $cate_product=DB::table('tbl_category_product')->where('category_status','0')
        ->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand')->where('brand_status','0')
        ->orderby('brand_id','desc')->get();  
        $customer_id=Session::get('customer_id');
        $customer_info=Db::table('tbl_customer')->where('customer_id',$customer_id)->get();
    
        return view('fontend.customer.customer_info')->with('category',$cate_product)
        ->with('brand',$brand_product)
        ->with('banner',$banner)
        ->with('customer_info',$customer_info);
    }
    public function update_customer(Request $request)
    {
        if($request->customer_password=="")
        {
            $data = array();
            $data['customer_name'] = $request->customer_name;
            $data['customer_email'] = $request->customer_email;
            $data['customer_phone'] = $request->customer_phone;
            $customer_id=Session::get('customer_id');
    
            $update_customer = Db::table('tbl_customer')->where('customer_id',$customer_id)->update($data);
            $message = "Cập nhật thành công";
            Session::put('message',$message);
    
            return Redirect::to('/customer-info');
        }
        else
        {
            $data = array();
            $data['customer_name'] = $request->customer_name;
            $data['customer_email'] = $request->customer_email;
            $data['customer_password'] = md5($request->customer_password);
            $data['customer_phone'] = $request->customer_phone;
            $customer_id=Session::get('customer_id');
    
            $update_customer = Db::table('tbl_customer')->where('customer_id',$customer_id)->update($data);
            $message = "Cập nhật thành công";
            Session::put('message',$message);
    
            return Redirect::to('/customer-info');
        }
       
    }
}

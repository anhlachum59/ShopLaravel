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

class OrderController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id)
        {
            return Redirect::to('dashboard');
        }
        else{
            return Redirect::to('/admin/login')->send();
        }
    }
    public function manage_order()
    {
        $this->AuthLogin();
        $all_order = DB::table('tbl_order')
        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
        ->join('tbl_payment','tbl_order.payment_id','=','tbl_payment.payment_id')
        ->select('tbl_order.*','tbl_customer.customer_name','tbl_payment.payment_method')
        ->orderby('tbl_order.order_id','desc')->get();
        $manager_order = view('admin.order.manage_order')->with('all_order',$all_order);
        return view('backend.admin_layout')->with('admin.order.manage_order',$manager_order);
    }
    public function view_order($order_id)
    {

        $this->AuthLogin();
        $order_by_id = DB::table('tbl_order')
        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
        ->join('tbl_payment','tbl_order.payment_id','=','tbl_payment.payment_id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        ->select('tbl_order.*','tbl_customer.*','tbl_shipping.*','tbl_order_details.*','tbl_payment.*')
        ->where('tbl_order.order_id',$order_id)
        ->first();
        $manager_order_by_id = view('admin.order.show_order')->with('order_by_id',$order_by_id);
        return view('backend.admin_layout')->with('admin.order.manage_order',$manager_order_by_id);
    }
}

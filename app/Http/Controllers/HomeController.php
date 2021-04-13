<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        //seo
        
        // $meta_desc = "Bán giày thôi :)))";
        // $meta_keywords = "MEOK bán giày có cá biết bơi và kêu meo meo";
        // $meta_title = "MEOK shoes shop";
        // $url_canonical = $request->url();
        //ket thuc seo

        $banner = DB::table('tbl_banner')->where('banner_status','0')->orderby('banner_id','desc')->get();

        $cate_product=DB::table('tbl_category_product')->where('category_status','0')
        ->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand')->where('brand_status','0')
        ->orderby('brand_id','desc')->get();  
        
        $all_product=DB::table('tbl_product')->where('product_status','0')
        ->orderby('product_id','desc')->limit(6)->get();  
           
        return view('fontend.home')->with('category',$cate_product)
        ->with('brand',$brand_product)
        ->with('all_product',$all_product)
        ->with('banner',$banner);
    }
    public function search(Request $request)
    {
        $banner = DB::table('tbl_banner')->where('banner_status','0')->orderby('banner_id','desc')->get();
        $keywords = $request->keywords_submit;
        $cate_product=DB::table('tbl_category_product')->where('category_status','0')
        ->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand')->where('brand_status','0')
        ->orderby('brand_id','desc')->get();  
        
       
        $search_product =DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();  
           
        return view('fontend.search')->with('category',$cate_product)
        ->with('brand',$brand_product)
        ->with('search_product',$search_product)
        ->with('banner',$banner);
    }
    public function product_tabs(Request $request)
    {
        $data = $request->all();
        $output = '';
        $product = Db::table('tbl_product')->where('brand_id',$data['cate_id'])->orderby('product_id','desc')->limit(4)->get();

        $product_count = $product->count();
        if($product_count>0)
        {
            $output.= '<div class="tab-content">
                            <div class="tab-pane fade active in" id="tshirt" >
                            ';
                            foreach($product as $key=>$pro)
                             $output.= '<a href="chi-tiet-san-pham/'.$pro->product_id.'">
                             <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="public/uploads/product/'.$pro->product_image.'"height="180" width="150" alt="" />
                                                <h2>'.number_format($pro->product_price,0,',',',').' VNĐ</h2>
                                                <p>'.$pro->product_name.'</p>
                                                <a href="chi-tiet-san-pham/'.$pro->product_id.'" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                </a>';
                                
                              $output.='  
                            </div>					
                        </div>
                        ';

        }
        else
        {
            $output.= '<div class="tab-content">
                            <div class="tab-pane fade active in" id="tshirt" >
                                <div class="col-sm-12">
                                    <p>Hiện chưa có sản phẩm cho thương hiệu này</p>
                                </div>
                                
                            </div>					
                        </div>
                        ';
        }
        echo $output;
    }
}

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

class BannerController extends Controller
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
    public function add_banner()
    {
        $this->AuthLogin();    
        return view('admin.banner.add_banner'); 
    }
    public function manage_banner()
    {
        $this->AuthLogin();
        $banner = DB::table('tbl_banner')->orderby('banner_id','desc')->get();
        $manager_banner = view('admin.banner.all_banner')->with('all_banner',$banner);
        return view('backend.admin_layout')->with('admin.brand.all_brand_product',$manager_banner);
    }
    public function unactive_banner($banner_id)
    {
        $this->AuthLogin();
        DB::table('tbl_banner')->where('banner_id',$banner_id)->update(['banner_status'=>1]);
        Session::put('message','Đã ẩn banner thành công');
        return Redirect::to('/manage-banner');
    }
    public function active_banner($banner_id)
    {
        $this->AuthLogin();
        DB::table('tbl_banner')->where('banner_id',$banner_id)->update(['banner_status'=>0]);
        Session::put('message','Hiển thị banner thành công');
        return Redirect::to('/manage-banner');
    }
    public function save_banner(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['banner_name'] = $request->banner_name;
        $data['banner_desc'] = $request->banner_desc;
        $data['banner_status'] = $request->banner_status;  
        $get_image = $request->file('banner_image');
        if($get_image)
        {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/banner',$new_image);
            $data['banner_image'] = $new_image;
            DB::table('tbl_banner')->insert($data);
            Session::put('message','Thêm banner thành công');
            return Redirect::to('/manage-banner');
        }
        $data['banner_image'] ='';
        DB::table('tbl_banner')->insert($data);
        Session::put('message','Thêm banner thành công');
        return Redirect::to('/manage-banner');    
    }
    public function edit_banner($banner_id)
    {
        $this->AuthLogin();

        $edit_banner = DB::table('tbl_banner')->where('banner_id',$banner_id)->get();
        $manager_banner = view('admin.banner.edit_banner')->with('edit_banner',$edit_banner);
        return view('backend.admin_layout')->with('admin.banner.edit_banner',$manager_banner); 
    }
    public function update_banner(Request $request,$banner_id)
    {
        $this->AuthLogin();
        $data = array();
        $data = array();
        $data['banner_name'] = $request->banner_name;
        $data['banner_desc'] = $request->banner_desc;
 
        $get_image = $request->file('banner_image');
        if($get_image)
        {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/banner',$new_image);
            $data['banner_image'] = $new_image;
            DB::table('tbl_banner')->where('banner_id',$banner_id)->update($data);
            Session::put('message','Cập nhật banner thành công');
            return Redirect::to('/manage-banner');
        }
        
        DB::table('tbl_banner')->where('banner_id',$banner_id)->update($data);
        Session::put('message','Cập nhật banner thành công');
        return Redirect::to('/manage-banner');
    }

    public function delete_banner($banner_id)
    {
        $this->AuthLogin();
        DB::table('tbl_banner')->where('banner_id',$banner_id)->delete();
        Session::put('message','Xóa banner thành công');
        return Redirect::to('/manage-banner');
    }
}

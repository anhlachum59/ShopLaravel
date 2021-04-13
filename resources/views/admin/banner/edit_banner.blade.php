@extends('backend.admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm banner
                        </header>
                        <?php 
                            $message = Session::get('message');
                            if($message)
                            {
                                echo '<span class="text-success">'.$message.'</span>';
                                Session::put('message'.null);
                            }
                            ?>
                        <div class="panel-body">
                        @foreach($edit_banner as $key=> $e_banner)
                            <div class="position-center">
                                <form role="form" id ="thembanner" action="{{URL::to('/update-banner/'.$e_banner->banner_id)}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên banner</label>
                                    <input type="text" value="{{$e_banner->banner_name}}" name="banner_name" class="form-control" id="banner_name" placeholder="Tên banner">
                                </div>
                            
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh banner</label>
                                    <input type="file" name="banner_image" class="form-control" id="exampleInputEmail1" >
                                    <img src="{{URL::to('public/uploads/banner/'.$e_banner->banner_image)}}" height="100"width="100">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả banner</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="banner_desc" id="banner_desc" placeholder="Mô tả banner">{{$e_banner->banner_desc}}</textarea>
                                </div>
                                
                                
                                
                                
                                
                                <button type="submit" name="update_banner" class="btn btn-info">Cập nhật banner</button>
                            </form>
                            </div>
@endforeach
                        </div>
                    </section>

            </div>
            <script>
                    $().ready(function() {
                    $("#thembanner").validate({
                    onfocusout: false,
                    onkeyup: false,
                    onclick: false,
                    
                    rules: {
                        "banner_name": {
                            required: true,
                        },
                        
                    },
                    messages:{
                        "product_name": {
                            required: "Bạn chưa nhập tên banner"     
                        },
                       
                    }
                });
            });
            </script>
            
@endsection
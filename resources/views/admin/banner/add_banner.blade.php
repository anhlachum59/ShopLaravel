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
                        
                            <div class="position-center">
                                <form role="form" id ="thembanner" action="{{URL::to('/save-banner')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên banner</label>
                                    <input type="text"  name="banner_name" class="form-control" id="banner_name" placeholder="Tên banner">
                                </div>
                            
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh banner</label>
                                    <input type="file" name="banner_image" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả banner</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="banner_desc" id="banner_desc" placeholder="Mô tả banner"></textarea>
                                </div>
                                
                                
                                
                                <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="banner_status" class="form-control input-sm m-bot15">
                                    <option value="0">Hiện</option>
                                    <option value="1">Ẩn</option>
                                </select>
                                </div>
                                
                                <button type="submit" name="add_banner" class="btn btn-info">Thêm banner</button>
                            </form>
                            </div>

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
@extends('backend.admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm sản phẩm
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
                                <form role="form" id ="themsanpham" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text"  name="product_name" class="form-control" id="product_name" placeholder="Tên sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text" name="product_price" class="form-control" id="product_price" placeholder="Giá sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="product_desc" id="product_desc" placeholder="Mô tả sản phẩm"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="product_content" id="product_content" placeholder="Nội dung sản phẩm"></textarea>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                <select name="product_cate" class="form-control input-sm m-bot15">
                                   @foreach($cate_product as $key => $cate)
                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</ option>
                                   @endforeach
                                </select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputPassword1">thương hiệu sản phẩm</label>
                                <select name="product_brand" class="form-control input-sm m-bot15">
                                @foreach($brand_product as $key => $brand)
                                    <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</ option>
                                   @endforeach
                                </select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="product_status" class="form-control input-sm m-bot15">
                                    <option value="0">Hiện</option>
                                    <option value="1">Ẩn</option>
                                </select>
                                </div>
                                
                                <button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
            <script>
                    $().ready(function() {
                    $("#themsanpham").validate({
                    onfocusout: false,
                    onkeyup: false,
                    onclick: false,
                    
                    rules: {
                        "product_name": {
                            required: true,
                        },
                        "product_price": {
                            required: true,
                        },
                        "product_desc": {
                            required: true,
                        },
                        "product_content": {
                            required: true,
                        },
                   
                    },
                    messages:{
                        "product_name": {
                            required: "Bạn chưa nhập tên sản phẩm"     
                        },
                        "product_price": {
                            required: "Bạn chưa nhập giá sản phẩm"     
                        },
                        "product_desc": {
                            required: "Bạn chưa nhập mô tả cho sản phẩm"
                        },
                        "product_content": {
                            required: "Bạn chưa nhập nội dung cho sản phẩm"
                        },
                    },
                    errorPlacement: function(error, element) {
                    if (element.attr("name") == "product_name" ) {
                        error.insertAfter("#product_name");
                    } else {
                        error.insertAfter(element);
                    }
                }
                });
            });
            </script>
            
@endsection
@extends('backend.admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm danh mục sản phẩm
                        </header>
                      
                        <div class="panel-body">
                        
                            <div class="position-center">
                                <form role="form" id="themdanhmuc" action="{{URL::to('/save-category-product')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" name="category_product_name" class="form-control" id="category_product_name" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="category_product_desc" id="category_product_desc" placeholder="Mô tả danh mục"></textarea>
                                </div>
                                <div class="form-group">
                                <select name="category_product_status" class="form-control input-sm m-bot15">
                                    <option value="0">Hiện</option>
                                    <option value="1">Ẩn</option>
                                </select>
                                </div>
                                
                                <button type="submit" name="add_category_product" class="btn btn-info">Thêm danh mục</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
            <script>
                    $().ready(function() {
                    $("#themdanhmuc").validate({
                    onfocusout: false,
                    onkeyup: false,
                    onclick: false,
                    
                    rules: {
                        "category_product_name": {
                            required: true,
                        },
                      
                    },
                    messages:{
                        "category_product_name": {
                            required: "Bạn chưa nhập tên danh mục sản phẩm"     
                        },
                       
                    }
                
                });
            });
            </script>
@endsection
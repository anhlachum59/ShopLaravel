<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--SEO -->
    
	<link rel="icon" type="image/x-icon" href=""/>
	<!--SEO -->
    <title>MEOK shoes shop</title>
    <link href="{{asset('../public/fontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('../public/fontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('../public/fontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('../public/fontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('../public/fontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('../public/fontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('../public/fontend/css/responsive.css')}}" rel="stylesheet">
	
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{('../public/fontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	@stack('css')
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +84 0981523017</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> tuanhkhoa0705@gmail.com</a></li>
								<li><div id="google_translate_element" width="10px"></div> </li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="logo pull-left">
							<a href="{{URL::to('/')}}"><img src="{{asset('../public/fontend/images/logo_meoK.png')}}" width="140px" height="60px" alt="" /></a>
						</div>
						
					</div>
					
					<div class="col-sm-9">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-star"></i> Yêu thích</a></li>
								<?php
									$customer_id = Session::get('customer_id');
									$shipping_id = Session::get('shipping_id');
									if($customer_id!=NULL && $shipping_id==NULL)
									{
								?>
								<li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
								<?php
									}elseif($customer_id!=NULL && $shipping_id!=NULL)
									{	
								?>
								<li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
								<?php
								}else
								{
								?>
								<li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
								<?php
								}
								?>
								
								<li><a href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
								<?php
									$customer_id = Session::get('customer_id');
									if($customer_id!=NULL)
									{
								?>
								<!-- user login dropdown start-->
								<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#">
										
										<span class="username">
										<?php 
											$name = Session::get('customer_name');
											if($name)
											{
												echo 'Chào '.$name;
												
											}
											?>
										</span>
										<b class="caret"></b>
									</a>
									<ul class="dropdown-menu extended logout">
										<li><a href="{{URL::to('/customer-info')}}"><i class=" fa fa-suitcase"></i>Thông tin cá nhân</a></li>
										<li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-lock"></i>Đăng xuất</a></li>
									</ul>
								</li>
								<!-- user login dropdown end -->
								
								<?php
								}else
								{
								?>
								<li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock"></i>Đăng nhập</a></li>
								<?php
								}
								?>
								
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-7">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{URL::to('/trang-chu')}}" class="active">Trang chủ</a></li>
								<li class="dropdown"><a href="#">Sản phẩm<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="#">Giày nam</a></li>
										<li><a href="#">Giày nữ</a></li>
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Tin tức<i class="fa fa-angle-down"></i></a>
								<ul role="menu" class="sub-menu">
                                        <li><a href="#">Tin mới</a></li>
										<li><a href="#">Khuyến mãi</a></li>
                                    </ul>
                                </li> 
								<li><a href="{{URL::to('/show-cart')}}">Giỏ hàng</a></li>
								<li><a href="{{URL::to('/contact')}}">Liên hệ</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-5">
						<form action="{{URL::to('/tim-kiem')}}" method="POST">
						{{csrf_field()}}
						<div class="search_box pull-right">
							<input name="keywords_submit" type="text" placeholder="Tìm kiếm sản phẩm"/>
							<input type="submit"style="margin:0;width:70px;color:#666" name="search_items" class="btn btn-primary btn-sm" value="Tìm kiếm">
						</div>
						</form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<?php
								$i = 0;
							?>
							@foreach($banner as $key=>$ban)
							<?php
								$i++;
							?>
							<div class="item {{$i==1 ? 'active' : '' }}">
								
								<div class="col-sm-12">
								<img src="{{URL::to('public/uploads/banner/'.$ban->banner_image)}}" height="400" width="1000">
								</div>
							</div>
							@endforeach
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Danh mục sản phẩm</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							@foreach($category as $key =>$cate)
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></h4>
								</div>
							</div>
							@endforeach
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Thương hiệu sản phẩm</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
								@foreach($brand as $key =>$brand)
									<li><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}"> <span class="pull-right">(50)</span>{{$brand->brand_name}}</a></li>
								@endforeach
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<!-- <div class="price-range">
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div>
						 -->
						<!-- <div class="shipping text-center">
							<img src="{{('../public/images/shipping.jpg')}}" alt="" />
						</div>
					 -->
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					@yield('content')
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					
					<div class="col-sm-12">
					<iframe src="https://www.google.com/maps/d/u/0/embed?mid=10gOwM1tHnLCPtNnlP5_WJtpS8uQLOa16" width="1190" height="270"></iframe>
		
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Dịch vụ</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Hỗ trợ online</a></li>
								<li><a href="#">Liên hệ với chúng tôi</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
				
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Chính sách</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Điều khoản sử dụng</a></li>
								<li><a href="#">Chính sách bảo mật</a></li>
								<li><a href="#">Chính sách hoàn tiền</a></li>
								<li><a href="#">Hệ thống thanh toán</a></li>

							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Về MEOK</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Thông tin công ty</a></li>
								<li><a href="#">Nghề nghiệp</a></li>
								<li><a href="#">Chi nhánh các của hàng</a></li>
								<li><a href="#">Bản quuyền</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>Thông tin mới nhất về MEOK</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Nhập email của bạn" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Nhận những thông báo mới nhất <br />từ chúng tôi</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		
	</footer><!--/Footer-->
	

	<script src="{{asset('../public/fontend/js/jquery.js')}}"></script>
	<script src="{{asset('../public/fontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('../public/fontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('../public/fontend/js/price-range.js')}}"></script>
	<script src="{{asset('../public/fontend/js/jquery.prettyPhoto.js')}}"></script>
	<script src="{{asset('../public/fontend/js/main.js')}}"></script>
	<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var cate_id = $('.tabs_product').data('id');
		var _token = $('input[name="_token"').val();
		$.ajax({
			url: '{{url('/product-tabs')}}',
				method: "POST",
				data: {cate_id:cate_id,_token:_token},
				success:function(data){
					$('#tabs_product').html(data);
				}
		});

		$('.tabs_product').click(function(){
			var cate_id=$(this).data('id');
			//alert(cate_id);
			var _token=$('input[name="_token"]').val();
			$.ajax({
				url: '{{url('/product-tabs')}}',
				method: "POST",
				data: {cate_id:cate_id,_token:_token},
				success:function(data){
					$('#tabs_product').html(data);
				}
			});
		});
	});
</script>
<script type="text/javascript">
		function googleTranslateElementInit() {
		new google.translate.TranslateElement({pageLanguage: 'vi'}, 'google_translate_element');
	}
</script>
<style>
    label.error {
        color: red;
    }  
</style>
</body>

</html>
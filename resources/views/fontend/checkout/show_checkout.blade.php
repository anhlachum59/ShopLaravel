@extends('master')
@section('content')

<section id="cart_items">
		<div class="container">
		<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
				  <li class="active">Thông tin thanh toán giỏ hàng</li>
				</ol>
			</div><!--/breadcrums-->

			

			<div class="register-req">
				<p>Làm ơn đăng ký hoặc đăng nhập để thanh toán và xem lại lịch sử mua hàng</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Điền thông tin</p>
							<div class="form-one">
								<form action="{{URL::to('/save-checkout-customer')}}" method="POST">	
									{{csrf_field()}}								
									<input type="text" name="shipping_email" placeholder="Email">
									<input type="text" name="shipping_name" placeholder="Họ và tên">
									<input type="text" name="shipping_address" placeholder="Địa chỉ">
									<input type="text" name="shipping_phone" placeholder="Số điện thoại">
									<textarea name="shipping_notes" placeholder="Ghi chú cho đơn hàng của bạn" rows="16"></textarea>
									<input type="submit" value="Gửi" name="send_order" class="btn btn-primary btn-sm">
								</form>
							</div>
							
						</div>
					</div>
										
				</div>
			</div>
			
	</section> <!--/#cart_items-->


@endsection
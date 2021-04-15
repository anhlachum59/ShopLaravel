@extends('master')
@section('content')


<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
				<?php 
					$message = Session::get('message7');
					if($message)
					{
						echo '<span class="text-alert">'.$message.'</span>';
						Session::put('message7'.null);
					}
				?>
					<div class="login-form"><!--login form-->
						<h2>Đăng nhập vào tài khoản</h2>
						<form role="form" id="dangnhap" action="{{URL::to('/login')}}" method="POST">
						{{csrf_field()}}
							<input type="text" id="email_account" required="required" name="email_account"placeholder="Tên tài khoản" />
							<input type="password" id="password_account" required="required" name="password_account" placeholder="Mật khẩu" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Ghi nhớ đăng nhập
							</span>
							<button type="submit" class="btn btn-default">Đăng nhập</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">HOẶC</h2>
				</div>
				<div class="col-sm-4">
				<?php 
					$message = Session::get('message');
					if($message)
					{
						echo '<span class="text-alert">'.$message.'</span>';
						Session::put('message'.null);
					}
				?>
				<?php 
					$message = Session::get('message6');
					if($message)
					{
						echo '<span class="text-alert">'.$message.'</span>';
						Session::put('message6'.null);
					}
				?>
					<div class="signup-form"><!--sign up form-->
						<h2>Đăng ký</h2>
						<form id="dangky" action="{{URL::to('/add-customer')}}" method="POST">
                        {{csrf_field()}}
							<input type="text" name="customer_name" required="required" id="customer_name" maxlength="50" placeholder="Họ và tên"/>
							<?php 
								$message1 = Session::get('message1');
								if($message1)
								{
									echo '<span class="text-alert">'.$message1.'</span>';
									Session::put('message1'.null);
								}
							?>
							<input type="email" name="customer_email" required="required" id="customer_email" maxlength="50" placeholder="Địa chỉ Email"/>
							<?php 
								$message2 = Session::get('message2');
								if($message2)
								{
									echo '<span class="text-alert">'.$message2.'</span>';
									Session::put('message2'.null);
								}
							?>
							<input type="password" name="customer_password" required="required" id="customer_password" placeholder="Mật khẩu"/>
							<?php 
								$message3 = Session::get('message3');
								if($message3)
								{
									echo '<span class="text-alert">'.$message3.'</span>';
									Session::put('message3'.null);
								}
							?>
							<input type="password" name="comfirm_password" required="required" id="comfirm_password" placeholder="Xác nhận mật khẩu"/>
							<?php 
								$message5 = Session::get('message5');
								if($message5)
								{
									echo '<span class="text-alert">'.$message5.'</span>';
									Session::put('message5'.null);
								}
							?>
                            <input type="text" name="customer_phone" required="required" id="customer_phone" placeholder="Số điện thoại"/>
							<?php 
								$message4 = Session::get('message4');
								if($message4)
								{
									echo '<span class="text-alert">'.$message4.'</span>';
									Session::put('message4'.null);
								}
							?>
							<button type="submit" class="btn btn-default">Đăng ký</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
		
	</section><!--/form-->
	
@endsection
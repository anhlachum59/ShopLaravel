@extends('master')
@section('content')
                <?php 
					$message = Session::get('message');
					if($message)
					{
						echo '<h2 style="text-align:center" class="text-success">'.$message.'</h2>';
						Session::put('message'.null);
					}
                    
				?>
<div class="row">  	
    
    @foreach($customer_info as $key=>$customer)
   
	    		<div class="col-sm-12">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Thông tin cá nhân</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" action="{{URL::to('/update-customer')}}" class="contact-form row" name="contact-form" method="post">
				            {{csrf_field()}}
                            <div class="form-group col-md-6">
                                <h3>Tên:</h3>
				                <input type="text" name="customer_name" class="form-control" required="required" value="{{$customer->customer_name}}" >
				            </div>
				            <div class="form-group col-md-6">
                                <h3>Email:</h3>
				                <input type="email" name="customer_email" class="form-control" required="required" value="{{$customer->customer_email}}">
				            </div>
				            <div class="form-group col-md-6">
                                <h3>Thay đổi mật khẩu:</h3>
				                <input type="password" name="customer_password" class="form-control"  value="">
				            </div>
				            <div class="form-group col-md-6">
                                <h3>Số điện thoại:</h3>
				                <input type="text" name="customer_phone" class="form-control" required="required" value="{{$customer->customer_phone}}">
				            </div>         
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Lưu">
				            </div>
				        </form>
	    			</div>
	    		</div>
            @endforeach
            </div>

@endsection

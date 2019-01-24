@extends('layout.index')
@section('content')
 <!-- Page Content -->
    <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
				  	<div class="panel-heading">Thông tin tài khoản</div>
				  	<div class="panel-body">
				    	<form action="nguoidung" method="post">
				    		@csrf

				    		@if(count($errors) > 0)
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                        <strong>{{$err}}</strong><br/>
                                    @endforeach
                                </div>
                            @endif
                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                    <strong>{{ session('thongbao') }}</strong>
                                </div>
                            @endif
				    		<div>
				    			<label>Họ tên</label>
							  	<input type="text" class="form-control" placeholder="Username" name="name" aria-describedby="basic-addon1" value="{{$nguoidung-> ten}}">
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1"
							  	readonly value="{{$nguoidung-> email}}" 
							  	>
							</div>
							<br>	
							<div>
							
				    			<label>Mật khẩu cũ</label>
							  	<input type="password" id="pass1" class="form-control password" name="password" aria-describedby="basic-addon1" >
							</div>
							<br>
							<div>
				    			<label>Mật khẩu mới</label>
							  	<input type="password" id="pass2" class="form-control password" name="rePass" aria-describedby="basic-addon1" >
							</div>
							<br>
							<button type="submit" class="btn btn-default">Sửa
							</button>

				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <!-- end slide -->
       
    </div>
    <!-- end Page Content -->
@endsection

@section('script')
	<script>
		$(document).ready(function(){
			$("#changePassword").change(function(){
				if($(this).is(':checked'))
				{
					$("#pass1").show();
				}else
				{
					$("#pass2").hide();
				}
			});
		});
	</script>
@endsection
@extends('layout.index')
@section('content')
            
    <div class="container">

    	@include('layout.slide')
	
						<style>
							.lentop {display:none; bottom: 10%; right: 30px; cursor: pointer;  position: fixed; z-index: 1000;}
							.lentop div {background:purple; border:2px solid #fff; border-radius:45px; padding:11px 12.5px; box-shadow: 1px 3px 5px 0px rgba(0, 0, 0, 0.3)}
							.lentop img {width:16px; height:16px;
							}
							
							#space{
								height: 5px;
								width: 100%;
							}
							
							
						
							.panel-default {
							    border-color: #ddd;
							    width: 1140px;
							}
							.row {
							    margin-right: -15px;
							    margin-left: -15px;
							    width: 1140px;
							}
						</style>

        <div class="space20" id="space"></div>

		
        <div class="row main-left">
            @include('layout.sideBar')

            <div class="col-md-9">
	            <div class="panel panel-default" id="content">            
	            	

	            	<div class="panel-body">
	            		@foreach($theloai as $tl)
		            		<!-- {{-- kiểm tra if có loại tin lớn hơn 1 thì in ra, nếu ko có thì ko in --}} -->
		            		@if(count($tl-> loaitin)> 0)
		            	
						    <div class="row-item row">
			                	<h3>
			                		<a>{{$tl-> Ten}}</a> |
			                		@foreach($tl-> loaitin as $lt) 	
			                		<small><a href="loaitin/{{$lt-> id}}/{{$lt-> TenKhongDau}}.html"><i>{{$lt-> Ten}}</i></a> / </small>
			                		@endforeach
			                	</h3>

			                	{{-- lấy ra 5 tin tức nổi bật tạo gần nhất lưu vào biến data --}}
			                	{{-- Laravel hổ trợ hàm shift: lấy dữ liệu của 1 trong 5 tin trên --}}
								<?php

									$data = $tl->tintuc->where('NoiBat',1)->sortByDesc('created_at')
										->take(5);
									
									$tin1 = $data->shift();
								?>
			                	<div class="col-md-8 border-right">
			                		<div class="col-md-5">
				                        <a href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">
				                            <img width="250px" height="200px" class="img" src="theme/upload/tintuc/{{$tin1['Hinh']}}" alt="hình tin tức">
				                        </a>
				                    </div>
									

				                    <div class="col-md-7">
				                        <a href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html"><h3>{{$tin1['TieuDe']}}</h3></a>
				                        <p>{!!$tin1['TomTat']!!}</p>
				                        <a class="btn btn-primary" style="background-color: purple" href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">Xem Chi Tiết <span class="glyphicon glyphicon-chevron-right" style="color: white"></span></a>
									</div>

			                	</div>
			                    

								<div class="col-md-4">
									@foreach($data-> all() as $tt)
									<a href="tintuc/{{$tt['id']}}/{{$tt['TieuDeKhongDau']}}.html">
										<h4>
											<span class="fas fa-newspaper" style="color: purple"></span>
											{{$tt['TieuDe']}}
										</h4>
									</a>
									@endforeach
								</div>
								
								<div class="break"></div>
			                </div>
			                <!-- end item -->
			                @endif
		                @endforeach

					</div>
	            </div>
        	</div>
        </div>
        <!-- /.row -->
    </div>


	

    {{-- button to top --}}
    <script>
		$(function(){
		$(window).scroll(function () {
		if ($(this).scrollTop() > 100) $(".lentop").fadeIn();
		else $(".lentop").fadeOut();
		});
		$(".lentop").click(function () {
		$("body,html").animate({scrollTop: 0}, "slow");
		});
		});
</script>
    <div class='lentop'>
		<div>
			<img src='https://1.bp.blogspot.com/-k6sikOdzFXQ/VwqCKDosmEI/AAAAAAAAKxE/nLxLhkTIO6o3iE5ZWmtxo2bf4QHdzPQNQ/s1600/top.png'/>
    	</div>
	{{-- end button to top --}}
	</div>
    @yield('script')
    <!-- end Page Content -->
@endsection

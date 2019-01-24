@extends('layout.index')

@section('content')
    
<style type="text/css">
    .lentop {display:none; bottom: 10%; right: 30px; cursor: pointer;  position: fixed; z-index: 1000;}
    .lentop div {background:purple; border:2px solid #fff; border-radius:45px; padding:11px 12.5px; box-shadow: 1px 3px 5px 0px rgba(0, 0, 0, 0.3)}
    .lentop img {width:16px; height:16px;}
    .col-md-9{
            top:10px;
            width: 100%;
        }
    .gohome{
            position: fixed;
            
            background-color: white; /* Blue background */
            border: none; /* Remove borders */
            
            font-size: 30px; /* Set a font size */
            cursor: pointer; /* Mouse pointer on hover */
            left: 20px;
            border-radius: 30px;
            bottom: 62px;
            box-shadow: 1px 3px 5px 0px rgba(0, 0, 0, 0.3)

        }
        .gohome:hover {
        background-color: RoyalBlue;
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
    <div class="gohome">
            <?php
                echo "<a href='home' ><i class='fa fa-home'></i></a>";
            ?>
    </div>
<!-- Page Content -->
    <div class="container">

    	@include('layout.slide')

        <div class="space20"></div>


        <div class="row main-left">
            @include('layout.sideBar')

            <div class="col-md-9">
	            <div class="panel panel-default">            

	            	<div class="panel-body">
	            		<!-- item -->
                        <h3><span class="glyphicon glyphicon-align-left"></span> Thông tin liên hệ</h3>
					    
                        <div class="break"></div>
					   	<h4><span class= "glyphicon glyphicon-home "> Địa chỉ :</span>  </h4>
                        <p> Đại Học Cần Thơ Khu Hòa An, Phụng Hiệp, Hậu Giang</p>

                        <h4><span class="glyphicon glyphicon-envelope"></span> Email : </h4>
                        <p> phihuongtu@gmail.com </p>

                        <h4><span class="glyphicon glyphicon-phone-alt"></span> Điện thoại : </h4>
                        <p> 01697367647 </p>



                        <br><br>
                        <h3><span class="glyphicon glyphicon-globe"></span> Bản đồ</h3>
                        <div class="break"></div><br>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d977.8717914408771!2d105.60185128043618!3d9.754355105975923!2m3!1f0!2f39.179223572499566!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x31a0f1d1e88956ef%3A0xef7a6de6658fee0c!2zxJDhuqFpIEjhu41jIEPhuqduIFRoxqEgS2h1IEjDsmEgQW4!5e1!3m2!1sen!2s!4v1538243718860" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

					</div>
	            </div>
        	</div>
        </div>
        <!-- /.row -->
    </div>
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
</div>
    <!-- end Page Content -->
@endsection
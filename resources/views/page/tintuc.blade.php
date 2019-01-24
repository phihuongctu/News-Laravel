@extends('layout.index')

@section('content')
    <style type="text/css">

        .lentop {display:none; bottom: 10%; right: 30px; cursor: pointer;  position: fixed; z-index: 1000;}
        .lentop div {background:purple; border:2px solid #fff; border-radius:45px; padding:11px 12.5px;box-shadow: 1px 3px 5px 0px rgba(0, 0, 0, 0.3)}
        .lentop img {width:16px; height:16px;}

        .gohome{
            position: fixed;
            
            background-color: white; 
            border: none; 
            
            
            font-size: 30px; 
            cursor: pointer; 
            left: 20px;
            border-radius: 30px;
            bottom: 62px;
            box-shadow: 1px 3px 5px 0px rgba(0, 0, 0, 0.3)

        }
        .gohome:hover {
        background-color: RoyalBlue;
        }
      
    </style>
    <div class="gohome">
            <?php
                echo "<a href='home' ><i class='fa fa-home'></i></a>";
            ?>
    </div>

    <div class="container">
        <div class="row">

            
            <div class="col-lg-9">

             
                <h1>{{$tintuc-> TieuDe}}</h1>

                
                <p class="lead">
                    by <a>Admin</a>
                </p>
                
       
                <img class="img-responsive" src="theme/upload/tintuc/{{$tintuc-> Hinh}}" alt="">

        
                <p><span class="glyphicon glyphicon-time"></span> Posted on : {{$tintuc-> created_at}}</p>
                <hr>

               
                {{-- Dùng chấm than để loại bỏ thẻ html, br,h1...chỉ in nội dung tin tức --}}
                <p class="lead">{!! $tintuc-> TomTat !!}</p> 

                <hr>
               
                        <div class="well">
                            @if(session('thongbao'))
                                {{session('thongbao')}}
                            @endif
                                <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                                <form role="form" action="comment/{{$tintuc-> id}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="NoiDung"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Gửi</button>
                                </form>
                    </div>
        
                <hr>
                
           

        
                @foreach($tintuc-> comment as $cmt)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$cmt-> user-> ten}}
                            <small>{{$cmt-> created_at}}</small>
                        </h4>
                        {{$cmt-> NoiDung}}
                    </div>
                </div>
                @endforeach

            </div>

            
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin liên quan</b></div>
                    <div class="panel-body">
                        @foreach($tinLienQuan as $tlq)
           
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="tintuc/{{$tlq-> id}}/{{$tlq-> TieuDeKhongDau}}.html">
                                    <img class="img-responsive" src="theme/upload/tintuc/{{$tlq-> Hinh}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="tintuc/{{$tlq-> id}}/{{$tlq-> TieuDeKhongDau}}.html"><b>{{$tlq-> TieuDe}}</b></a>
                            </div>
                       
                            <div class="break"></div>
                        </div>
                  
                        @endforeach
                    </div>
                </div>
                
                
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin nổi bật</b></div>
                    <div class="panel-body">
                        @foreach($tinNoiBat as $tnb)
                 
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="tintuc/{{$tnb-> id}}/{{$tnb-> TieuDeKhongDau}}.html">
                                    <img class="img-responsive" src="theme/upload/tintuc/{{$tnb-> Hinh}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="tintuc/{{$tnb-> id}}/{{$tnb-> TieuDeKhongDau}}.html"><b>{{$tnb-> TieuDe}}</b></a>
                            </div>
                       
                            <div class="break"></div>
                        </div>
                   
                        @endforeach 
                        
                    </div>
                </div>
                
            </div>

        </div>
     
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

@endsection
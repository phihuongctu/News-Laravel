@extends('layout.index')

@section('content')
    
    <style>
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
        div.hinh{
            width: 30%;
            height: 250px;
        }
        div .noidung{
            width: 70%;
            text-align: left;
            float: right;
        }
            #space{
                height: 5px;
                width: 100%;
            }
            /*#content{
                margin-top: 50px;
            }*/
            .col-md-9{
                top:10px;
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

    <div class="gohome">
            <?php
                echo "<a href='home' ><i class='fa fa-home'></i></a>";
            ?>
    </div>

<!-- Page Content -->
    <?php
        function doimau($str,$tukhoa){
             return str_replace($tukhoa, "<strong style='color:red;'>$tukhoa</strong>", $str);
        }
    ?>
    <div class="container">
        @include('layout.slide')
        <div class="row">
                   {{-- side bar --}}
        @include('layout.sideBar')

            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337ab7; color:white;text-align: center;">
                        <h3><b>Tìm Kiếm : {{$tukhoa}}</b></h3>
                    </div>
                    
                    @foreach($tintuc as $tt)
                    <div class="row-item row">
                        <div class="col-md-3 hinh">

                            <a href="detail.html">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="theme/upload/tintuc/{{$tt-> Hinh}}" alt="">
                            </a>
                        </div>

                        <div class="col-md-9 noidung">
                            <h3>{{$tt-> TieuDe}}</h3>
                            <p>{{$tt-> TomTat}}</p>
                            <a class="btn btn-primary" href="tintuc/{{$tt-> id}}/{{$tt-> TieuDeKhongDau}}.html">Xem Chi Tiết <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="break"></div>
                    </div>
                    @endforeach
                    
                    <div style="text-align: center;">
                    {{$tintuc-> links()}}
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
    <!-- end Page Content -->
@endsection
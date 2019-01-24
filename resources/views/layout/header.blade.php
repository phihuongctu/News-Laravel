    <style type="text/css">
    .navbar-form .form-control{
        background-image: linear-gradient(to top, #fdcbf1 0%, #fdcbf1 1%, #e6dee9 100%);
    }
    .btn-default:hover{
        background-image: linear-gradient(to right, #f83600 0%, #f9d423 100%);
    }
    .header {
        background-image: linear-gradient(to right, #868f96 0%, #596164 100%);
      top: 0;
      border-width: 0 0 1px;
      opacity:0.95;
      background-color:black;
      width: auto;
      float: left;
      height: 50px;
    }

    .trai{
      width: 200px;
      float: left;
}
    .trai a{
      padding-right: 30px;
}
    .phai{

    }
   nav a{
        color:white;
        float: left;
    }
    .search{
      margin-left: 50px;
    }
    .pull-right{
    margin-right: 30px;
    width: 250px;
    
    }
    .pull-right a{
        padding-right: 30px;
        float: left;
    }
    
    {{-- Đồng Hồ --}}
    .h{
                 font-weight:50;
                  display: block;
                  font-size: 10px;
                  margin: 0 0 0px;
                  letter-spacing: 2px;
                  width: 100px;
                  color: white;
                  float: left;
                  margin-top: 15px;
      }
      .ngay{

        color: white;
        letter-spacing: 2px;
        font-size: 10px;
        font-weight:50;
        width: 200px;
        float: left;
        margin-top: 15px;
      }
    /*end Đồng Hồ*/
</style>
<nav class=" navbar-fixed-top header" role="">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="home">Tin Tức Online</a>
        </div>
        
        <div class="collapse navbar-collapse" id="">
          <div class="trai">
            <ul class="trai navbar-nav">

                <li>
                    <a href="https://www.facebook.com/phihuong.tu">Fanpage</a>
                    <a href="lienhe">Liên hệ</a>
                </li>
            </ul>
          </div>
            <form class=" search navbar-form navbar-left" role="search" action="timkiem" method="post">
                @csrf
                <div class="form-group">
                   <input type="text" class="form-control" placeholder="Bạn muốn tìm gì?" name="tukhoa">
               </div>
               <button type="submit" class="btn btn-default">Tìm</button>
           </form>
           <span id="h" class="h"></span>
           <div class="ngay">
            <script type="text/javascript" id="ngay" class="ngay">
                n=new Date();
                if(n.getTimezoneOffset()==0)t=n.getTime()+(7*60*60*1000);
                else
                  t=n.getTime();n.setTime(t);
                  var dn=new Array("Chủ nhật","Thứ 2","Thứ 3","Thứ 4","Thứ 5","Thứ 6","Thứ 7");
                  d=n.getDay();
                  m=n.getMonth()+1;y=n.getFullYear()
                  document.write(dn[d]+", "+(n.getDate()<10?"0":"")+n.getDate()+"/"+(m<10?"0":"")+m+"/"+y)
              </script>
            </div>
           <ul class="phai navbar-nav pull-right">
                  @if(!isset( Auth::user()-> ten )) {{-- nếu ko có người dùng đăng nhập thì hthi dk, dn else hthi người dùng --}}
                     <li>
                        <a href="dangki">Đăng ký</a>
                        <a href="admin/DangNhap">Đăng nhập</a>
                    </li>
                   
                  @else
                    
                    <li class="phai">
                        <a href="nguoidung">
                            <span class ="glyphicon glyphicon-user"></span>
                            {{ Auth::user()-> ten }}

                        </a>
                        <a href="dangxuat">Đăng xuất</a>
                    </li>

                  
             @endif
        </ul>
    </div>
<!-- /.navbar-collapse -->
<!-- /.container -->
</nav>
              <script>
                  var myVar=setInterval(function(){myTimer()},1000); 
                  function myTimer() {
                    var d=new Date();
                    var t=d.toLocaleTimeString();
                    document.getElementById("h").innerHTML=t;
                  }
              </script>
                

              

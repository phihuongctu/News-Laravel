
 @extends('admin.layout.index')
@section('content')
                    @if(Auth::user())
    <div class="row">
            <div class="col-lg-3 col-xs-6" style="background-color: #99FF00; width: 19%;" ></div>
            <div class="col-lg-3 col-md-6 col-sm-6" style="background-color: #99FF00; width: 27%;">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <br>
                  <h2 class="card-category glyphicon glyphicon-bookmark"> News</h2>
                  
                  <h2>{{\App\TinTuc::count()}}</h2>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    
                    <a href="admin/TinTuc/DanhSach">Chi Tiết <span class="glyphicon glyphicon-chevron-right" style="color: black"></span></a>
                  </div>
                </div>
              </div>

            </div>
            <div class="col-lg-3 col-md-6 col-sm-5" style="background-color: #FFCC00; width: 27%;">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <br>
                  <h2 class="card-category glyphicon glyphicon-user"> User </h2>
                  <h2>{{\App\User::count()}}</h2>
                  <a href="admin/User/DanhSach"> Chi Tiết <span class="glyphicon glyphicon-chevron-right" style="color: black"></span></a>
                </div>  
              </div>
            </div>
            <div class="col-lg-2 col-md-5 col-sm-5" style="background-color: #CC00CC; width: 27%;">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <br>
                  <h2 class="card-category glyphicon glyphicon-picture"> Slides</h2>
                  <h2>{{\App\Slide::count()}}</h2>
                  <a href="admin/Slide/DanhSach"> Chi Tiết <span class="glyphicon glyphicon-chevron-right" style="color: black"></span></a>
                </div>
              </div>
            </div>
          </div>
          @else
          <center><h1 style="background-color: #CC00CC;"> Bạn Cần Đăng Nhập Admin</h1></center>
          @endif
@endsection
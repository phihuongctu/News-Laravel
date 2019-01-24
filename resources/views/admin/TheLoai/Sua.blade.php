@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> Sửa Thể Loại
                            <small>{{$theloai->Ten}}</small>
                        </h1>
                    </div>
            
                    <div class="col-lg-7" style="padding-bottom:120px">
                        
                        <form action="admin/TheLoai/Sua/{{$theloai->id}}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                    <strong>{{ session('thongbao') }}</strong>
                                </div>
                            @endif

                            <div class="form-group">
                                <p>
                                    <label>Tên hiện tại của thể loại</label>
                                    <input class="form-control input-width" name="current_cate" value="{{$theloai->Ten}}" disabled="true" />
                                </p>

                                <p>
                                    <label>Thay đổi tên thể loại</label>
                                    <input class="form-control input-width" name="cate_changed" placeholder="Nhập tên mới cho Thể Loại" />
                                </p>
                            </div>
                            
                            <button type="submit" class="btn btn-default">Sửa Thể Loại</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
        
            </div>
        
        </div>
      @endsection

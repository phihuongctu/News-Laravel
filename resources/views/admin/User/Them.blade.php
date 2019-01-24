@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm
                            <small>Người Dùng</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(session('thongbao'))
                                <div class="alert alert-success">
                                    <strong>{{ session('thongbao') }}</strong>
                                </div>
                            @endif
                        <form action="admin/User/Them" method="POST">
                            {{-- enctype="multipart/from-data để up file --}}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            
                            @if(count($errors) > 0)
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                        <strong>{{$err}}</strong><br/>
                                    @endforeach
                                </div>
                            @endif
                            
                            <div class="form-group">
                                <p><label>Tên</label></p>
                                <input type="text" class="form-control input-width" name="Ten" placeholder="Nhập Tên của người dùng"/>
                            </div>

                            <div class="form-group">
                                <p><label>Email</label></p>
                                <input type="email" class="form-control input-width" name="Email" placeholder="Nhập email" />
                            </div>
                            <div class="form-group">
                                <p><label>Mật Khẩu</label></p>
                                <input type="password" class="form-control input-width" name="Pass" placeholder="Nhập pass"  />
                            </div>
                            <div class="form-group">
                                <p><label>Nhập Lại Mật Khẩu</label></p>
                                <input type="password" class="form-control input-width" name="rePass" placeholder="Nhập lại pass"  />
                            </div>
                            <div class="form-group">
                                <label>Quyền Người Dùng</label>
                                <label class="radio-inline">
                                    <input name="Quyen" value="0" checked="" 
                                     type="radio">Cơ Bản
                                </label>
                                <label class="radio-inline">
                                    <input name="Quyen" value="1" checked="" 
                                     type="radio">Admin
                                </label>
                            </div>
                            
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default btn-mleft">Nhập Lại</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection
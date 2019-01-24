@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm
                            <small> Thể Loại</small>
                        </h1>
                    </div>
                    
                    <div class="col-lg-7" style="padding-bottom:120px">

                    <!-- Thông báo công việc đã được thực hiện -->
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            <strong>{{session('thongbao')}}</strong>
                        </div>
                    @endif
                        <form action="admin/TheLoai/Them" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <p><label>Tên Thể Loại</label></p>
                                <input class="form-control input-width" name="Ten" placeholder="Nhập tên Thể Loại.." />
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
@endsection
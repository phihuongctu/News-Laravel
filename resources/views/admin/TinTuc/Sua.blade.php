@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sửa
                            <small>Tin Tức</small>
                        </h1>
                    </div>
                   
                    <div class="col-lg-7" style="padding-bottom:120px">

                        
                        <form action="admin/TinTuc/Sua/{{$tintuc-> id}}" method="POST" enctype="multipart/form-data"> <!-- Form bắt buộc phải có thuộc tính enctype thì mới up được file lên -->
                            {{ csrf_field() }}
                            
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

                            <div class="form-group">
                                <label>Thể Loại</label>
                                <select class="form-control" name="TheLoai" id="TheLoai">
                                    @foreach($theloai as $tl)
                                    <option
                                    @if($tintuc->loaitin->theloai-> id == $tl-> id)
                                    {{'selected'}}
                                    @endif 
                                    value="{{$tl-> id}}">{{$tl-> Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loại Tin</label>
                                <select class="form-control" name="LoaiTin" id="LoaiTin">
                                    @foreach($loaitin as $lt)
                                    <option

                                    @if($tintuc->loaitin->theloai-> id == $lt-> id)
                                    {{"selected"}}
                                    @endif 
                                    value="{{$lt-> id}}">{{$lt-> Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tiêu Đề</label>
                                <input class="form-control ckeditor" name="TieuDe" placeholder="Mời nhập...." value="{{$tintuc-> TieuDe}}" />
                            </div>
                            <div class="form-group">
                                <label>Tóm Tắt</label>
                                <textarea id="demo" class="form-control ckeditor" rows="3" name="TomTat">
                                    {{$tintuc-> TomTat}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea id="demo" class="form-control ckeditor" rows="3" name="NoiDung">
                                    {{$tintuc-> NoiDung}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>Hình Ảnh</label>
                                <p><img src="theme/upload/tintuc/{{$tintuc-> Hinh}}"></p>
                                <input id="Hinh" type="file" class="form-control ckeditor" name="Hinh" />
                            </div>
                            <div class="form-group">
                                <label>Nổi Bật</label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="0" 
                                    @if($tintuc-> NoiBat == 0)
                                        {{"checked"}}
                                    @endif
                                     type="radio">Có
            
                                </label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="1"
                                     
                                    @if($tintuc-> NoiBat == 1)
                                        {{"checked"}}
                                    @endif
                                     type="radio">Không
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                </div>
                <!-- /.End Phần Sửa -->
                {{-- Phần cmt --}}
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh Sách
                            <small>Comment</small>
                        </h1>
                    </div>
                   
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            <strong>{{session('thongbao')}}</strong>
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Người Dùng</th>
                                <th>Nội Dung</th>
                                <th>Ngày Đăng</th>
                                <th>Xóa</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tintuc-> comment as $cmt)
                            <tr class="odd gradeX" align="center">
                                <td>{{$cmt-> id}}</td>
                                <td><p>{{$cmt-> user-> ten}}</p></td>
                                <td>{{$cmt-> NoiDung}}</td>
                                <td>{{$cmt-> created_at}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/Comment/Xoa/{{$cmt-> id}}/{{$cmt-> idTinTuc}}"> Xóa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- End phần cmt --}}
        </div>
    
@endsection
 {{-- chọn thể loại hiển thị loại tin of thể loại đó --}}
@section('script'){
    <script >
        $(document).ready(function(){
            $("#TheLoai").change(function(){
                var idTheLoai = $(this).val()
                $.get("admin/Ajax/LoaiTin/" +idTheLoai,function(data){
                    $("#LoaiTin").html(data);
                });
            });
        });
    </script>
@endsection
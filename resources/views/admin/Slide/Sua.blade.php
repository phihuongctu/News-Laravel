@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sửa
                            <small>Slide</small>
                        </h1>
                    </div>
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(session('thongbao'))
                                <div class="alert alert-success">
                                    <strong>{{ session('thongbao') }}</strong>
                                </div>
                            @endif
                        <form action="admin/Slide/Sua/{{$slide -> id}}" method="POST" enctype="multipart/form-data"> <!-- Form bắt buộc phải có thuộc tính enctype thì mới up được file lên -->
                            {{ csrf_field() }}  
                                                 
                            @if(count($errors) > 0)
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                        <strong>{{$err}}</strong><br/>
                                    @endforeach
                                </div>
                            @endif
                           
                            <div class="form-group">
                                <p><label>Tên</label></p>
                                <input type="text" class="form-control input-width" name="Ten" placeholder="Nhập Tên của Slide" value="{{$slide-> Ten}}" />
                            </div>

                            <div class="form-group">
                                <p><label>Nội Dung</label></p>
                                <textarea name="NoiDung" id="demo" class="form-control ckeditor" rows="3">
                                    {{$slide-> NoiDung}}
                                </textarea>
                            </div>

                            <div class="form-group">
                                <p><label>Đường Dẫn</label></p>
                                <input type="text" class="form-control input-width" name="Link" placeholder="Nhập Đường dẫn URL" value="{{$slide-> link}}" />
                            </div>

                            <div class="form-group">
                                <p><label>Thêm Hình Ảnh</label></p>
                                <p><img width="500px;" src="theme/upload/Slide_hinh/{{$slide-> Hinh}}"></p>
                                <input type="file" class="form-control" name="Hinh" id="Hinh">
                            </div>

                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default btn-mleft">Nhập Lại</button>
                        </form>
                    </div>
                </div>
                
            </div>
           
        </div>
      
@endsection
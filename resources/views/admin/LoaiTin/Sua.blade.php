@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sửa
                            <small>{{$loaitin-> Ten}}</small>
                        </h1>
                    </div>
                   
                    <div class="col-lg-7" style="padding-bottom:120px">
                        {{-- thông báo --}}
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

                        <form action="admin/LoaiTin/Sua/{{$loaitin-> id}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" >
                            <div class="form-group">
                                <label>Thể Loại</label>
                                <select class="form-control input-width" name="Theloai">
                                    @foreach($theloai as $tl)
                                        <option 
                                        @if($loaitin-> idTheLoai == $tl-> id)
                                            {{ 'selected' }}
                                        @endif
                                        value="{{ $tl->id }}">{{ $tl->Ten }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên Loại Tin</label>
                                <input class="form-control" name="Sualt" placeholder="Mời nhập loại tin..." value="{{$loaitin-> Ten}}" />
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
            </div>
        </div>
@endsection

 @extends('admin.layout.index')

 @section('content')

 
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh Sách
                            <small>Loại Tin</small>
                        </h1>
                    </div>
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            <strong>{{session('thongbao')}}</strong>
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead >
                            <tr >
                                <th style="text-align: center;">ID</th>
                                <th style="text-align: center;">Tên Loại Tin</th>  
                                <th style="text-align: center;">Tên Không Dấu</th>
                                <th style="text-align: center;">Thể Loại</th>                          
                                <th style="text-align: center;">Xóa</th>
                                <th style="text-align: center;">Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($loaitin as $lt)
                            <tr class="even gradeC" align="center">
                                <td>{{$lt-> id}}</td>
                                <td>{{$lt-> Ten}}</td>
                                <td>{{$lt-> TenKhongDau}}</td>
                                <td>{{$lt->TheLoai->Ten}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/LoaiTin/Xoa/{{$lt-> id}}"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/LoaiTin/Sua/{{$lt-> id}}">Sửa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
            
        </div>
        
@endsection
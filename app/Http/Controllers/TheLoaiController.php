<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\TheLoai;
use Validator;
class TheLoaiController extends Controller
{
     
    public function getThem(){
        
    	return view('admin.TheLoai.Them');
    }

    public function postThem(Request $request){
    	$this -> validate($request,
    		[
    			'Ten' => 'required|min:3|max:100'
    		],
    		[
    			'Ten.required' => 'Bạn chưa nhập thể loại',
    			'Ten.min' => 'Độ dài từ 3 đến 100 kí tự',
    			'Ten.max' => 'Độ dài từ 3 đến 100 kí tự',
    		]);
    	$theloai = new TheLoai;
    	$theloai -> Ten = $request -> Ten;
    	$theloai -> TenKhongDau = changeTitle($request -> Ten);
    	echo changeTitle($request -> Ten);
    	$theloai -> save(); //lưu lại
        return redirect('admin/TheLoai/Them')->with('thongbao','Hay Quá! Thêm Thành Công Rồi'); 
    }

    public function getDanhSach(){
    	$theloai = TheLoai::all();
    	return view('admin.TheLoai.DanhSach',['theloai'=>$theloai]);
    }
    public function getSua($id){
    	$theloai = TheLoai::find($id);
        return view('admin.TheLoai.Sua',['theloai'=>$theloai]);
    }
    public function postSua(Request $request,$id){
        $theloai = TheLoai::find($id);
        $this->validate($request,
            [
                'cate_changed' => 'required|unique:TheLoai,Ten|min:3|max:100'
            ],
            [
                'cate_changed.required' => 'Bạn chưa nhập tên Thể Loại!',
                'cate_changed.unique' => 'Tên Thể Loại đã tồn tại, vui lòng nhập lại!!',
                'cate_changed.min' => 'Tên Thể Loại gồm ít nhất 3 ký tự!',
                'cate_changed.max' => 'Tên Thể Loại gồm tối đa 100 ký tự!'
            ]);
        $theloai->Ten = $request->cate_changed;
        $theloai->TenKhongDau = changeTitle($request->cate_changed);
        $theloai->save();

        return redirect('admin/TheLoai/Sua/'.$id)->with('thongbao','Hay Quá! Cập Nhật Thành Công Rồi');
    }
    public function getXoa(Request $request,$id){
        $theloai = TheLoai::find($id);
        $theloai->delete();
        return redirect('admin/TheLoai/DanhSach')->with('thongbao','Hay Quá! Xóa Thành Công Rồi');
    }
}

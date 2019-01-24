<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;
class LoaiTinController extends Controller{
	public function getDanhSach(){
		$loaitin = LoaiTin::all();
		return view('admin.LoaiTin.DanhSach',['loaitin'=>$loaitin]);
	}
	public function getThem(){
		$theloai = TheLoai::all();
		return view('admin.LoaiTin.Them',['theloai'=>$theloai]);
	}
	public function postThem(Request $request){
		$this-> validate($request,
		[
			'Tenlt' => 'required|unique:LoaiTin,Ten|min:3|max:100',//unique:kt trùng ten trg bảng loại tin
																	//required: kt trường trống
			'TheLoai' => 'required' // yêu cầu người dùng chọn tl
		],
		[
			'Tenlt.required'=>'Chưa nhập tên kìa!',
			'Tenlt.unique'=>'Trùng tên rồi, chọn tên khác đi',
			'Tenlt.min'=>'Tên ngắn quá, phải hơn 3 kí tự',
			'Tenlt.max'=>'Tên dài quá,phải ít hơn 100 kí tự',
			'TheLoai.required'=>'Bạn chưa chọn thể loại kìa!'
		]);
		$loaitin= new LoaiTin;
		$loaitin-> Ten = $request-> Tenlt;
		$loaitin-> TenKhongDau = changeTitle($request-> Tenlt);
		$loaitin-> idTheLoai = $request-> TheLoai;
		$loaitin-> save();
		return redirect('admin/LoaiTin/Them')-> with('thongbao','Hay quá! Ban thêm thành công rồi');
	}
	
	public function getSua($id){
		$theloai = TheLoai::all();
		$loaitin = LoaiTin::find($id);
		return view('admin.LoaiTin.Sua',['loaitin'=>$loaitin, 'theloai'=>$theloai]);
	}
	public function postSua(Request $request,$id){
		$this-> validate($request,
			[
				'Sualt' =>'required|unique:LoaiTin,Ten|min:3|max:100',
				'Theloai' =>'required'
			],
			[
			'Sualt.required'=>'Chưa nhập tên kìa!',
			'Sualt.unique'=>'Trùng tên rồi, chọn tên khác đi',
			'Sualt.min'=>'Tên ngắn quá, phải hơn 3 kí tự',
			'Sualt.max'=>'Tên dài quá,phải ít hơn 100 kí tự',
			'TheLoai.required'=>'Bạn chưa chọn thể loại kìa!'
			]);
			$loaitin = LoaiTin::find($id);
			$loaitin-> Ten = $request-> Sualt;
			$loaitin-> TenKhongDau = changeTitle($request-> Sualt);
			$loaitin-> idTheLoai = $request-> Theloai;
			$loaitin->save();
			return redirect('admin/LoaiTin/Sua/'.$id)-> with('thongbao','Hay quá! Ban thêm thành công rồi');
	}
	protected static function postXoa($id){
		// LoaiTin::where('id', $id)->delete();
		$loaitin = LoaiTin::find($id);
		$loaitin->foreign('idLoaiTin')->references('id')->on('loaitin')->onDelete('cascade');
		return redirect('admin/LoaiTin/DanhSach')-> with('thongbao','Hay quá! Bạn đã xóa thành công');
	}
}
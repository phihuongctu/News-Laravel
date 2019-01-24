<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;

class TinTucController extends Controller
{
	public function getDanhSach(){
		$tintuc = TinTuc::get();
		return view('admin/TinTuc/DanhSach',['tintuc'=>$tintuc]);
	}
	public function getThem(){
		$theloai = TheLoai::all();
		$loaitin = LoaiTin::all();
		return view('admin.TinTuc.Them',['theloai'=>$theloai, 'loaitin'=>$loaitin]);
	}
	public  function postThem(Request $request){
		$this->validate($request,
			// Điều Kiện
			[
				'LoaiTin'=>'required',
				'TieuDe'=>'required|min:3|unique:TinTuc,TieuDe',
				'TomTat'=>'required',
				'NoiDung'=>'required'
			],
			// Thông báo
			[
				'LoaiTin.required'=>'Chưa chọn loại tin kìa!',
				'TieuDe.required'=>'Chưa nhập tiêu đề kìa!',
				'TieuDe.min'=>'Phải có ít nhất 3 kí tự',
				'TieuDe.unique'=>'Trùng tiêu đề rồi kìa!',
				'TomTat.required'=>'Chưa nhập tóm tắt kìa!',
				'NoiDung.required'=>'Chưa nhập nôi dung kìa!'
			]);
		$tintuc = new TinTuc;
		$tintuc->TieuDe = $request->TieuDe;
		$tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
		$tintuc->TomTat = $request->TomTat;
		$tintuc->NoiDung = $request->NoiDung;
		$tintuc->idLoaiTin = $request->LoaiTin;

		if($request->hasFile('Hinh')) // Kiểm tra xem người dùng có upload hình hay không
        {
            $img_file = $request->file('Hinh'); // Nhận file hình ảnh người dùng upload lên server
            
            $img_file_extension = $img_file->getClientOriginalExtension(); // Lấy đuôi của file hình ảnh

            if($img_file_extension != 'png' && $img_file_extension != 'jpg' && $img_file_extension != 'jpeg')
            {
                return redirect('admin/TinTuc/Them')->with('error','Định dạng hình ảnh không hợp lệ (chỉ hỗ trợ các định dạng: png, jpg, jpeg)!');
            }

            $img_file_name = $img_file->getClientOriginalName(); // Lấy tên của file hình ảnh

            $random_file_name = str_random(4).'_'.$img_file_name; // Random tên file để tránh trường hợp trùng với tên hình ảnh khác trong CSDL
            while(file_exists('theme/upload/tintuc/'.$random_file_name)) // Trường hợp trên gán với 4 ký tự random nhưng vẫn có thể xảy ra trường hợp bị trùng, nên bỏ vào vòng lặp while để kiểm tra với tên tất cả các file hình trong CSDL, nếu bị trùng thì sẽ random 1 tên khác đến khi nào ko trùng nữa thì thoát vòng lặp
            {
                $random_file_name = str_random(4).'_'.$img_file_name;
            }
            echo $random_file_name;

            $img_file->move('theme/upload/tintuc',$random_file_name); // file hình được upload sẽ chuyển vào thư mục có đường dẫn như trên
            $tintuc->Hinh = $random_file_name;
        }
         // Nếu người dùng không upload hình thì sẽ gán đường dẫn là rỗng

        $tintuc->save();

        return redirect('admin/TinTuc/Them')->with('thongbao','Thêm Tin thành công!');
    }
	public function getSua($id){
		$theloai = TheLoai::all();
		$loaitin = LoaiTin::all();
		$tintuc = TinTuc::find($id);
		return view('admin.tintuc.sua',['tintuc'=>$tintuc, 'loaitin'=>$loaitin, 'theloai'=>$theloai]);
	}
	public function postSua(Request $request,$id){
		$tintuc = TinTuc::find($id);
		$this->validate($request,
			// Điều Kiện
			[
				'LoaiTin'=>'required',
				'TieuDe'=>'required|min:3|unique:TinTuc,TieuDe',
				'TomTat'=>'required',
				'NoiDung'=>'required'
			],
			// Thông báo
			[
				'LoaiTin.required'=>'Chưa chọn loại tin kìa!',
				'TieuDe.required'=>'Chưa nhập tiêu đề kìa!',
				'TieuDe.min'=>'Phải có ít nhất 3 kí tự',
				'TieuDe.unique'=>'Trùng tiêu đề rồi kìa!',
				'TomTat.required'=>'Chưa nhập tóm tắt kìa!',
				'NoiDung.required'=>'Chưa nhập nôi dung kìa!'
			]);
		$tintuc = new TinTuc;
		$tintuc->TieuDe = $request->TieuDe;
		$tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
		$tintuc->TomTat = $request->TomTat;
		$tintuc->NoiDung = $request->NoiDung;
		$tintuc->idLoaiTin = $request->LoaiTin;

		if($request->hasFile('Hinh')) // Kiểm tra xem người dùng có upload hình hay không
        {
            $img_file = $request->file('Hinh'); // Nhận file hình ảnh người dùng upload lên server
            
            $img_file_extension = $img_file->getClientOriginalExtension(); // Lấy đuôi của file hình ảnh

            if($img_file_extension != 'png' && $img_file_extension != 'jpg' && $img_file_extension != 'jpeg')
            {
                return redirect('admin/TinTuc/Sua')->with('error','Định dạng hình ảnh không hợp lệ (chỉ hỗ trợ các định dạng: png, jpg, jpeg)!');
            }

            $img_file_name = $img_file->getClientOriginalName(); // Lấy tên của file hình ảnh

            $random_file_name = str_random(4).'_'.$img_file_name; // Random tên file để tránh trường hợp trùng với tên hình ảnh khác trong CSDL
            while(file_exists('theme/upload/tintuc/'.$random_file_name)) // Trường hợp trên gán với 4 ký tự random nhưng vẫn có thể xảy ra trường hợp bị trùng, nên bỏ vào vòng lặp while để kiểm tra với tên tất cả các file hình trong CSDL, nếu bị trùng thì sẽ random 1 tên khác đến khi nào ko trùng nữa thì thoát vòng lặp
            {
                $random_file_name = str_random(4).'_'.$img_file_name;
            }
            echo $random_file_name;

            $img_file->move('theme/upload/tintuc',$random_file_name); // file hình được upload sẽ chuyển vào thư mục có đường dẫn như trên
            $tintuc->Hinh = $random_file_name;
        }
         // Nếu người dùng không upload hình thì sẽ gán đường dẫn là rỗng

        $tintuc->save();

        return redirect('admin/TinTuc/Sua/'.$id)->with('thongbao','Hay Quá! Sửa Tin thành công!');
    }
		
	public function getXoa($id){
		$tintuc = TinTuc::find($id);
		$tintuc-> delete();
		return redirect('admin/TinTuc/DanhSach')->with('thongbao','Hay Quá!! Xóa thành công rồi');
	}

}
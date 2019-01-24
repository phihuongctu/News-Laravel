<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\TheLoai;
use App\Slide;
use App\LoaiTin;
use App\TinTuc;
use App\User;
class PageController extends Controller
{
	// dùng view share để chia sẻ, truyển theloai, slide vào các view
	function __construct(){
		$theloai = TheLoai::all();
        $slide = Slide::all();
        $loaitin= LoaiTin::all();
		view()->share('theloai',$theloai);
        view()->share('slide',$slide);
        view()->share('loaitin',$loaitin);
        

        if (Auth::check()) {
            view()->share('nguoidung',Auth::user());
        }
	}
    public function home(){
    	// $theloai = TheLoai::all();  // sử dụng view share thay thế
    	return view('page.home');
    }
    public function lienhe(){
    	return view('page.lienhe');
    }
    public function loaitin($id){
        $loaitin = LoaiTin::find($id);
        $tintuc = TinTuc::where('idLoaiTin',$id)-> paginate(5); //paginate : phân 5 loại tin 1 trang, hỗ trợ sẵn trong laravel
        return view('page.loaitin',['loaitin'=>$loaitin, 'tintuc'=>$tintuc]);
    
    }
    public function tintuc($id){
           $tintuc = TinTuc::find($id);
           $tinNoiBat = TinTuc::where('NoiBat',1)->take(4)->get(); //lấy ra 4 tin nổi bật
           $tinLienQuan = TinTuc::where('idLoaiTin',$tintuc-> idLoaiTin)->take(4)->get();
           return view('page.tintuc',['tintuc'=>$tintuc,'tinNoiBat'=>$tinNoiBat,'tinLienQuan'=>$tinLienQuan]);
    }  
    public function getDangXuat(){
        Auth::logout();
        return redirect('home');
    }
    public function getNguoiDung(){
        $user = Auth::user();
        return view('page.nguoidung',['nguoidung'=>$user]);
    }
    public function postNguoiDung(Request $request){
        $this->validate($request,
            [
                'name'=>'required|min:3'
            ],
            [
                'name.required'=>'Chưa nhập tên kìa',
                'name.min'=>'Tên phải lớn hơn 3 kí tự'
            ]);
        $user = Auth::user();
        $user-> ten = $request-> name;
        $user->save();
        return redirect('nguoidung')->with('thongbao','Hay quá!! Sửa thành công rồi');
    }
    public function getDangKi(){
        return view('page.dangki');
    }
    public function postDangKi(Request $request){
        $this->validate($request,
            [
                'name'=>'required|min:3',
                'email'=>'required|unique:users,email',
                'pass'=>'required|min:6|max:30',
                'rePass'=>'required|same:pass'
            ],
            [
                'name.required'=>'Tên không được bỏ trống',
                'email.required'=>'Email không được bỏ trống',
                'email.unique'=>'Email đã tồn tại',
                'pass.required'=>'Mật khẩu không được bỏ trống',
                'pass.min'=>'Mật khẩu phải có ít nhất 6 kí tự',
                'pass.max'=>'Mật khẩu tối đa 30 kí tự',
                'rePass.required'=>'Chưa nhập lại mật khẩu kìa',
                'rePass.same'=>'Mật khẩu chưa trùng khớp'
            ]);
        $user = new User;
        $user-> ten = $request-> name;
        $user-> email = $request-> email;
        $user-> password = bcrypt($request-> pass);
        // $user-> Password = $request-> rePass;
        $user-> quyen = 0;
        $user->save();
        return redirect('dangki')->with('thongbao','Hay Quá!! Đăng kí thành công rồi');
    }
    public function timkiem(Request $request){
        $tukhoa = $request-> tukhoa;
        $tintuc = TinTuc::where('TieuDe','like',"%$tukhoa%")->orWhere('TomTat','like',"%$tukhoa%")->orWhere('NoiDung','like',"%$tukhoa%")->take(20)->paginate(5);
        return view('page.timkiem',['tintuc'=>$tintuc],['tukhoa'=>$tukhoa]);
    }
}



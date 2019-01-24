<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use App\Comment;
use App\Slide;
use App\User;
class UserController extends Controller{
	public function getDanhSach(){
    	$user = User::all();
    	return view('admin.User.DanhSach',['user'=>$user]);
    }
    public function dashboard(Request $request){
        return view('admin.dashboard');
    }
    public function getThem(){
    	return view('admin.User.Them');
    }
    public function postThem(Request $request){
    	$this->validate($request,
    		[
    			'Ten'=>'required',
    			'Email'=>'required',
    			'Pass'=>'required',
    			'rePass'=>'required'
    		],
    		[
    			'Ten.required'=>'Tên không được bỏ trống',
    			'Email.required'=>'Email không được bỏ trống',
    			'Pass.required'=>'Mật khẩu không được bỏ trống',
    			'rePass.required'=>'Nhập lại mật khẩu không trùng khớp'
    		]);
    	$user = new User;
    	$user-> ten = $request-> Ten;
    	$user-> email = $request-> Email;
        $user-> password = bcrypt($request-> rePass);
    	// $user-> Password = $request-> Pass;
    	$user-> quyen = $request-> Quyen;
    	$user->save();
    	return redirect('admin/User/Them')->with('thongbao','Hay Quá!! Thêm thành công rồi');
    }
    public function getXoa($id){
    	$user = User::find($id);
    	$user->delete();
    	return redirect('admin/User/DanhSach')->with('thongbao','Hay Quá!! Xóa thành công rồi');
    }
    public function getSua($id){
    	$user = User::find($id);
    	return view('admin.User.Sua',['user'=>$user]);
    }
    public function postSua(Request $request,$id){
        $this-> validate($request,
            [
                'Ten'=>'required',
                'Email'=>'required',
                'Pass'=>'required',
                'rePass'=>'required'
            ],
            [
                'Ten.required'=>'Tên không được bỏ trống',
                'Email.required'=>'Email không được bỏ trống',
                'Pass.required'=>'Mật khẩu không được bỏ trống',
                'rePass.required'=>'Nhập lại mật khẩu không trùng khớp'
            ]);
        $user = User::find($id);
        $user-> ten = $request-> Ten;
        $user-> email = $request-> Email;
        $user-> password = bcrypt($request-> rePass);
        // $user-> Password = $request-> Pass;
        $user-> quyen = $request-> Quyen;
        $user->save();
        return redirect('admin/User/Sua/'.$id)->with('thongbao','Hay Quá!! Sửa thành công rồi');
    }
    public function getDangNhap(){
        return view('admin.Login');
    }
    public function postDangNhap(Request $request){
        $this-> validate($request,
            [
                'email'=>'required',
                'password'=>'required'
            ],
            [
                'email.required'=>'Chưa nhập Email kìa!!',
                'password.required'=>'Chưa nhập mật khẩu kìa!!'
            ]);
        if(Auth::attempt(['email'=>$request-> email,
                        'password'=>$request-> password
                ]))
        {
            return redirect('home');
        }else{
            return redirect('admin/DangNhap')->with('thongbao','Đăng nhập không thành công');
        }
    }
    public function getDangXuat(){
        Auth::logout();
        return redirect('admin/DangNhap');
    }
}
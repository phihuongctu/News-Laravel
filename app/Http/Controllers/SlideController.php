<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use App\Comment;
use App\Slide;
use Image;
class SlideController extends Controller{
	public function getDanhSach(){
    	$slide = Slide::all();
    	return view('admin.Slide.DanhSach',['slide'=>$slide]);
    }
    public function getThem(Request $request){
    	return view('admin.Slide.Them');
    }
    public function postThem( Request $request){
        
        $this->validate($request,
            [
                'Ten'=>'required',
                'NoiDung'=>'required',
                'Link'=>'required'
            ],
            [
                'Ten.required'=>'Chưa nhập tên kìa!',
                'NoiDung.required'=>'Chưa nhập nội dung kìa!',
                'Link.required'=>'Chưa nhập link kìa!'
            ]);
        $slide = new Slide;
        $slide -> Ten = $request-> Ten;
        $slide -> NoiDung = $request->NoiDung;
        if($request->has('Link'))
            $slide-> Link = $request-> Link;

       if($request->hasFile('Hinh')) // Kiểm tra xem người dùng có upload hình hay không
        {
            $img_file = $request->file('Hinh'); // Nhận file hình ảnh người dùng upload lên server
            
            $img_file_extension = $img_file->getClientOriginalExtension(); // Lấy đuôi của file hình ảnh

            if($img_file_extension != 'png' && $img_file_extension != 'jpg' && $img_file_extension != 'jpeg')
            {
                return redirect('admin/Slide/Them')->with('error','Định dạng hình ảnh không hợp lệ (chỉ hỗ trợ các định dạng: png, jpg, jpeg)!');
            }

            $img_file_name = $img_file->getClientOriginalName(); // Lấy tên của file hình ảnh

            $random_file_name = str_random(4).'_'.$img_file_name; // Random tên file để tránh trường hợp trùng với tên hình ảnh khác trong CSDL
            while(file_exists('theme/upload/Slide_Hinh/'.$random_file_name)) // Trường hợp trên gán với 4 ký tự random nhưng vẫn có thể xảy ra trường hợp bị trùng, nên bỏ vào vòng lặp while để kiểm tra với tên tất cả các file hình trong CSDL, nếu bị trùng thì sẽ random 1 tên khác đến khi nào ko trùng nữa thì thoát vòng lặp
            {
                $random_file_name = str_random(4).'_'.$img_file_name;
            }
            echo $random_file_name;

            $img_file->move('theme/upload/Slide_Hinh',$random_file_name); // file hình được upload sẽ chuyển vào thư mục có đường dẫn như trên
            $slide->Hinh = $random_file_name;
        }
         // Nếu người dùng không upload hình thì sẽ gán đường dẫn là rỗng

        $slide->save();

        return redirect('admin/Slide/Them')->with('thongbao','Thêm Slide thành công!');
    }

    public function getSua($id){
        $slide = Slide::find($id);
        return view('admin.Slide.Sua',['slide'=>$slide]);
    }
    public function postSua(Request $request, $id){
        $this->validate($request,
            [
                'Ten'=>'required',
                'NoiDung'=>'required',
                'Link'=>'required'
            ],
            [
                'Ten.required'=>'Chưa nhập tên kìa!',
                'NoiDung.required'=>'Chưa nhập nội dung kìa!',
                'Link.required'=>'Chưa nhập link kìa!'
            ]);
        $slide = Slide::find($id);
        $slide -> Ten = $request-> Ten;
        $slide -> NoiDung = $request->NoiDung;
        if($request->has('Link'))
            $slide-> Link = $request-> Link;

        if($request->hasFile('Hinh')) // Kiểm tra xem người dùng có upload hình hay không
        {
            $img_file = $request->file('Hinh'); // Nhận file hình ảnh người dùng upload lên server
            
            $img_file_extension = $img_file->getClientOriginalExtension(); // Lấy đuôi của file hình ảnh

            if($img_file_extension != 'png' && $img_file_extension != 'jpg' && $img_file_extension != 'jpeg')
            {
                return redirect('admin/Slide/Sua')->with('error','Định dạng hình ảnh không hợp lệ (chỉ hỗ trợ các định dạng: png, jpg, jpeg)!');
            }

            $img_file_name = $img_file->getClientOriginalName(); // Lấy tên của file hình ảnh

            $random_file_name = str_random(4).'_'.$img_file_name; // Random tên file để tránh trường hợp trùng với tên hình ảnh khác trong CSDL
            while(file_exists('theme/upload/Slide_Hinh/'.$random_file_name)) // Trường hợp trên gán với 4 ký tự random nhưng vẫn có thể xảy ra trường hợp bị trùng, nên bỏ vào vòng lặp while để kiểm tra với tên tất cả các file hình trong CSDL, nếu bị trùng thì sẽ random 1 tên khác đến khi nào ko trùng nữa thì thoát vòng lặp
            {
                $random_file_name = str_random(4).'_'.$img_file_name;
            }
            echo $random_file_name;

            $img_file->move('theme/upload/Slide_Hinh',$random_file_name); // file hình được upload sẽ chuyển vào thư mục có đường dẫn như trên
            $slide->Hinh = $random_file_name;
        }
        
         // Nếu người dùng không upload hình thì sẽ gán đường dẫn là rỗng
        $slide->save();

        return redirect('admin/Slide/Sua/'.$id)->with('thongbao','Sửa Slide thành công!');
        
    }
    public function getXoa($id){
        $slide = Slide::find($id);
        $slide->delete();
        return redirect('admin/Slide/DanhSach')->with('thongbao','Hay Quá!! Xóa thành công rồi');
    }
 }
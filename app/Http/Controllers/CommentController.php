<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use App\Comment;
class CommentController extends Controller{
	public function getXoa($id, $idTinTuc){
		$comment = Comment::find($id);
		$comment->delete();
		return redirect('admin/TinTuc/Sua/'.$idTinTuc)->with('thongbao','Hay Quá!! Xóa CMT thành công rồi');
	}
	public function postComment(Request $request,$id){
		$idTinTuc = $id;
		$tintuc = TinTuc::find($id);
		$comment = new Comment;
		$comment-> idTinTuc = $idTinTuc;
		$comment-> idUser = Auth::user()-> id;
		$comment-> NoiDung = $request-> NoiDung;
		$comment-> save();
		return redirect("tintuc/$id/".$tintuc-> TieuDeKhongDau.".html")->with('thongbao','Hay Quá!! Comment thành công rồi');
	}
}

    <hr>
    <footer>
        <div class="footer">
		<div class="footer1">
			<div class="footer-left">
				<div class="footer-box">
				<h6><img src="theme\upload\images\logo.jpg"></h6>
				<ul>
					<br>
					<p style="color: white;">Trang tin tức online nhanh, cập nhật 24/24.</p>
					<li>
								<a href="https://www.facebook.com/phihuong.tu"><i class="fab fa-facebook" style="color: white;font-size: 20px;"> Facebook</i></a>
					</li>
					<li>
								<a href="https://www.instagram.com/phi_huong/?hl=en"><i class="fab fa-instagram" style="color: white;font-size: 20px;"> Intagram</i></a>
					</li>							
					<li>
								<a href="https://www.youtube.com/channel/UC6EC0OLQBdjCr8McNfhimNA/featured?view_as=subscriber"><i class="fab fa-youtube" style="color: white;font-size: 20px;"> Youtube</i></a>
					</li>
					<li>
								<a href="https://www.youtube.com/channel/UC6EC0OLQBdjCr8McNfhimNA/featured?view_as=subscriber"><i class="fab fa-twitter" style="color: white;font-size: 20px;"> Twitter</i></a>
					</li>
				</ul>
				</div>
			</div>
			<div class="footer-left">
				<div class="footer-box">
				<h6>Tin Mới Nhất</h6>
		
				<?php 
                              $tintuc = DB::select("select * from tintuc order by updated_at limit 0,3");
                ?>
				<ul>
					@foreach($tintuc as $tt)
					<br>
					<li><a href="tintuc/{{$tt-> id}}/{{$tt-> TieuDeKhongDau}}.html">
                                
                               	 <img width="100px" height="250px" class="img" src="theme/upload/tintuc/{{$tt-> Hinh}}" alt="">
                                <a href="tintuc/{{$tt-> id}}/{{$tt-> TieuDeKhongDau}}.html">{{$tt-> TieuDe}}</a>
                         </a>
                      </li>
					@endforeach
				</ul>
				</div>
			</div>
			<div class="footer-left">
				<div class="box footer-box">
				<h6>Tin Phổ Biến</h6>
				<?php 
                                $tintuc = DB::select("select * from tintuc order by NoiBat='1' limit 0,3");
                ?>
                <ul>
                @foreach($tintuc as $tt)
                	<br>
					<li style="list-style-type: none;"><a href="tintuc/{{$tt-> id}}/{{$tt-> TieuDeKhongDau}}.html">        
                                <img width="100px" height="100px" class="img" src="theme/upload/tintuc/{{$tt-> Hinh}}" alt="">
                                <a href="tintuc/{{$tt-> id}}/{{$tt-> TieuDeKhongDau}}.html" style="color: white;">{{$tt-> TieuDe}}</a>
                            </a>
                   </li>
               
                @endforeach
            </ul>
				</div>
			</div>
		</div>
	</div>
    </footer>

 

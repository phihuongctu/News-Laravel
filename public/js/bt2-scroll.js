document.addEventListener('DOMContentLoaded',function(){
	//bắt sự kiện
	var trangthai='duoi300';
	var menunholai=document.querySelector('.menu');
	window.addEventListener('scroll',function(){
		if (window.pageYOffset>300) {
			if (trangthai=='duoi300') {
					trangthai='tren300';
					menunholai.classList.add('nholai');
			}
		}else if (window.pageYOffset<=300){
			if (trangthai=='tren300') {
				menunholai.classList.remove('nholai');
					trangthai='duoi300';
				
			}
		}
	});
});
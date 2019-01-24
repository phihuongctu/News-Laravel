    <link rel="stylesheet" type="text/css" href="css/slide.css">
    <style type="text/css">
        .col-md-3{
            width: 100%;
            height: 300px;
        }
        .menu1{
            float: left;
            /*position: relative;
            display: block;*/
            padding: 10px 15px;
            margin-bottom: -1px;
            background-color: #fff;
            border: 1px solid #ddd;

        }
        #slider {
          position: relative;
          overflow: hidden;
          margin: 60px auto 0 auto;
          border-radius: 4px;
          transition: 1s;

}
    </style>                           
<div id="slider">
  <a  class="control_next">></a>
  <a  class="control_prev"><</a>
  <ul>
    <?php $i=0;?>
    @foreach($slide as $sl)
    <li >
        <img class="slide-image"  src="theme/upload/Slide_hinh/{{$sl-> Hinh}}" 
        alt="{{$sl-> NoiDung}}">
    </li>
    @endforeach
  </ul>  
</div>
    





                            
<script type="text/javascript">
    jQuery(document).ready(function ($) {

  $('#checkbox').change(function(){
    setInterval(function () {
        moveRight();
    }, 3000);
  });
  
    var slideCount = $('#slider ul li').length;
    var slideWidth = $('#slider ul li').width();
    var slideHeight = $('#slider ul li').height();
    var sliderUlWidth = slideCount * slideWidth;
    
    $('#slider').css({ width: slideWidth, height: slideHeight });
    
    $('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });
    
    $('#slider ul li:last-child').prependTo('#slider ul');

    function moveLeft() {
        $('#slider ul').animate({
            left: + slideWidth
        }, 200, function () {
            $('#slider ul li:last-child').prependTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    function moveRight() {
        $('#slider ul').animate({
            left: - slideWidth
        }, 200, function () {
            $('#slider ul li:first-child').appendTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    $('a.control_prev').click(function () {
        moveLeft();
    });

    $('a.control_next').click(function () {
        moveRight();
    });

});    

</script>
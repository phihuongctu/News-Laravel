
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Trang Tin Tức</title>
    <base href="{{asset('')}}">
    <!-- Bootstrap Core CSS -->
    
    <!-- Custom CSS -->
    <link href="css/my.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    
    <style>
/* Style The Dropdown Button */
            .dropbtn {
                background-color: purple;
                color: white;
                padding: 15px;
                font-size: 16px;
                border: none;
                cursor: pointer;
                margin-left: 15px;
                font-weight: bold;
            }

            /* The container <div> - needed to position the dropdown content */
            .dropdown {
                position: relative;
                display: inline-block;
            }

            /* Dropdown Content (Hidden by Default) */
            .dropdown-content {
                display: none;
                position: absolute;
                background-color: purple;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
                
            }

            /* Links inside the dropdown */
            .dropdown-content a {
                color: black;
                font-weight: 10;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }

            /* Change color of dropdown links on hover */
            .dropdown-content a:hover {background-color: #f1f1f1}

            /* Show the dropdown menu on hover */
            .dropdown:hover .dropdown-content {
                display: block;
            }

            /* Change the background color of the dropdown button when the dropdown content is shown */
            .home{
                background-color: purple;
                border-radius: 15px;
            }
            .menu{
                background-color: purple;
                width: 1300px !important;
                margin-left: 15px;
            }
            .nav {
                padding-left: 0;
                margin-bottom: 0;
                list-style: none;
                width: 1140px;
            }

</style>

</head>
<body>
<div class="menu">
   <ul class="nav navbr-nav">
        @foreach($theloai as $tl)
        @if(count($tl-> loaitin) > 0) 
            <div class="dropdown">
              <button class="dropbtn">{{$tl-> Ten}}</button>
              <div class="dropdown-content">
                    @foreach($tl-> loaitin as $lt)
                        <a href="loaitin/{{$lt-> id}}/{{$lt-> TenKhongDau}}.html">{{$lt-> Ten}}</a>
                    @endforeach
              </div>
            </div>
        @endif
        @endforeach
    </ul>
</div>
</body>

</html>




    {{-- sile bar --}}

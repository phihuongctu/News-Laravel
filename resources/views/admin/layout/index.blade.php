<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Web Tin Tức">
    <meta name="author" content="">
    <title>Admin - Từ Phi Hướng</title>
    <base href="{{asset('')}}">

  
    <link href="theme/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

  
    <link href="theme/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

  
    <link href="theme/dist/css/sb-admin-2.css" rel="stylesheet">

   
    <link href="theme/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    
    <link href="theme/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

   
    <link href="theme/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>

    <div id="wrapper">

        @include('admin.layout.header')

        @yield('content')

    </div>
    
    <script src="theme/bower_components/jquery/dist/jquery.min.js"></script>

  
    <script src="theme/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  
    <script src="theme/bower_components/metisMenu/dist/metisMenu.min.js"></script>


    <script src="theme/dist/js/sb-admin-2.js"></script>


    <script src="theme/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="theme/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

   
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
    <script type="text/javascript" language="javascript" src="theme/ckeditor/ckeditor.js" ></script>
    @yield('script')
</body>

</html>

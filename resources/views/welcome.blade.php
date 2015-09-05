<!DOCTYPE html>
<html>
    <head>
       <title>APIRT - Home</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="Assets/css/bootstrap.css" />

       
    </head>
    <body>
        <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ action('RequestController@welcome') }}">APIRT</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
             @yield('navItems')
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>


   @yield('content')
   
    <script src="Assets/js/jquery-1.11.3.js"></script>
    <script src="Assets/js/bootstrap.js"></script>
    </body>
</html>

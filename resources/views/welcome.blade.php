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
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
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
   
      <div class="footer">
   	<a href="https://github.com/lightwalker21/APIRT" target="blank"> <img src="Images/GitHub-Mark-32px.png" /></a>
  	 </div>
	
    <script src="Assets/js/jquery-1.11.3.js"></script>
    <script src="Assets/js/bootstrap.js"></script>


    </body>
   
</html>

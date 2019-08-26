
<!DOCTYPE html>
<html lang="en">

  <head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>AlumSpot</title>

  <!-- Bootstrap core CSS -->
  <link href="css/landpage/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="css/landpage/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="css/landpage/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/landpage/landing-page.min.css" rel="stylesheet">
    
    
  </head>

  <body>
      
    @include('LandPage.layouts.navbar')
        
    @yield('content')
        
    @include('LandPage.layouts.footer')
        
    <!-- Bootstrap core JavaScript -->
    <script src="js/LandPage/jquery/jquery.min.js"></script>
    <script src="js/LandPage/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        function openLog(event, tabName) {
            var i, x, tablinks;
            var x = document.getElementsByClassName("tab");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none"; 
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < x.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            event.currentTarget.className += " active"; 
        }
    </script>
    
  </body>

</html>
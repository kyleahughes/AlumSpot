
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title', 'AlumSpot')</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootStrapLandPage.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="/css/landpage.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    
    
  </head>

  <body>
      
    @include('LandPage.layouts.nav')
        
    @yield('content')
        
    @include('LandPage.layouts.footer')
        
    <!-- Bootstrap core JavaScript -->
    <script src="/js/LandPage/JQuery.js"></script>
    <script src="/js/LandPage/BootStrap.js"></script>
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
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
        
    <!--Face SDK login window-->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '{your-app-id}',
          cookie     : true,
          xfbml      : true,
          version    : '{latest-api-version}'
        });

        FB.AppEvents.logPageView();   

      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "https://connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>
    
    
  </body>

</html>
<!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="/">AlumSpot</a>
      
      @if(Auth::user())
      <a class="btn btn-primary" href="/coach/home">Home</a>
      @elseif(Auth::guard('alumni')->user())
      <a class="btn btn-primary" href="/alumni/home">Home</a>
      @else
      <a class="btn btn-primary" href="/login">Sign In</a>
      @endif
    </div>
  </nav>
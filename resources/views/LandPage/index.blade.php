@extends('LandPage.layouts.master')


@section('content')
    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('cityScape.jpg')">
              <div class="carousel-caption d-none d-md-block" style="color: black; background-color: rgb(211,211,211,.7); border-radius: 100px;">
              <h3>Connect with Alumni</h3>
              <p>Regiser to join your team's exclusive alumni network</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('field.jpg');  box-shadow: 0px 0px 300px 20px white inset;">
            <div class="carousel-caption d-none d-md-block" style="color: black; background-color: rgb(211,211,211,.7); border-radius: 100px;">
              <h3>Stay updated</h3>
              <p>Remain up to date with program and alumni events</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('donate.jpg')">
            <div class="carousel-caption d-none d-md-block" style="color: black; background-color: rgb(211,211,211,.7); border-radius: 100px;">
              <h3>Donate & Challenge</h3>
              <p>Donate directly to the program through fundraisers and team challenges</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>

    <!-- Page Content -->
    <div class="container">

      <!-- Features Section -->
      <div class="row m-4">
        <div class="col-lg-6">
          <h2>Register Your Team</h2>
          <p>As a coach, you can register your team and let your alumni connect through your new alumni group</p>
          <ul>
            <li>Keep track of alumni and career paths</li>
            <li>Directly collect donations through fundraisers</li>
            <li>Create events for alumni to attend</li>
            <li>Update alumni about the program</li>
          </ul>
          <p>Once you create your team's page, alumni will be able to register for your program and create their own profiles.</p>
        </div>
        <div class="col-lg-6">
          <img class="img-fluid rounded" src="chartNetwork.jpg" alt="">
        </div>
      </div>
      <!-- /.row -->
      
      <hr>
      
      <!-- Features Section -->
      <div class="row m-4">
        <div class="col-lg-6">
          <img class="img-fluid rounded" src="alumGroup.jpg" alt="">
        </div>
        <div class="col-lg-6">
          <h2>Register As An Alumni</h2>
          <p>As a coach, you can register your team and let your alumni connect through your new alumni group</p>
          <ul>
            <li>Create a profile to connect with other alumni</li>
            <li>Donate directly to your team</li>
            <li>Stay updated with events and team news</li>
            <li>Create fundraising challenges for the team</li>
          </ul>
          <p>Your coach needs to create your team's group page in order to register for the site. If you want your team to have a site, reach out to your head coach!</p>
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <div class='mb-4 row justify-content-center'>
      <!-- Call to Action Section -->
        <div class="col-md-4">
          <a class="btn btn-lg btn-secondary btn-block" href="#">Frequently Asked Questions</a>
        </div>
      </div>
    </div>
    <!-- /.container -->
@endsection
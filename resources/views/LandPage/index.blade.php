@extends('LandPage.layouts.master')


@section('content')
  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">We're working on a better way to maintain an active alumni network.</h1>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form>
            <div class="form-row">
              <div class="col-10 col-md-9 mb-2 mb-md-0">
                <input type="email" class="form-control form-control-lg" placeholder="Enter your email...">
              </div>
              <div class="col-12 col-md-4">
                <button type="submit" class="btn btn-block btn-lg btn-primary">Get early access</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </header>

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center">
    <h2 class="mb-5">How does AlumSpot Work?</h2>
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-user-follow m-auto text-primary"></i>
            </div>
            <h3>Sign Up</h3>
            <p class="lead mb-0">Sign up for an account, pick your school and sport.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-envelope-letter m-auto text-primary"></i>
            </div>
            <h3>Invite</h3>
            <p class="lead mb-0">Send an email to your alumni asking them to join and fill out their profile.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-people m-auto text-primary"></i>
            </div>
            <h3>Connect</h3>
            <p class="lead mb-0">Your entire network is now free to connect and build stronger relationships.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Image Showcases -->
  <section class="showcase">
    <div class="container-fluid p-0">
      <div class="row no-gutters">

        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('landpage/Artboard1.png');"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>Member Profiles</h2>
          <p class="lead mb-0"><h5>Members create their own profiles.</h5></p>
          <p>- Members create their own profiles with personal and professional information</p>
          <p>- Members have access to the entire network's contact information</p>
          <p>- Secure logins ensure that your members' personal information stays within your network</p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 text-white showcase-img" style="background-image: url('landpage/Artboard1.png');"></div>
        <div class="col-lg-6 my-auto showcase-text">
          <h2>Events</h2>
          <p class="lead mb-0"><h5>Create events, collect RSVP's and manage attendees all from one spot.</h5></p>
          <p>- Coaches can create and manage events</p>
          <p>- Collect RSVP's and see who will be attending</p>
          <p>- Collect donations or have members pay for tickets right through the platform</p>
          <p>- Send emails to the attendees and build buzz or let them know if anything changes
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('landpage/Artboard1.png');"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>Email Center</h2>
          <p class="lead mb-0"><h5>AlumSpot makes it easy for you to send emails and maintain consistant communication with your members.</h5></p>
          <p>- Create and send emails right through the platform</p>
          <p>- Separate your alumni list into groups for more targeted comunications</p>
          <p>- Collect donations or have members pay for tickets right through the platform</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section class="testimonials text-center bg-light">
    <div class="container">
      <h2 class="mb-5">AlumSpot is the easiest way for you to create and maintain an active alumni network online.</h2>
      <div class="row">
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="landpage/GettyImages-1.jpg" alt="">
            <h5>Foster Better Communications</h5>
            <p class="font-weight-light mb-0">With everybody's information in one place, players and alumni have access to the entire network.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="landpage/vince-fleming-aZVpxRydiJk-unsplash.jpg" alt="">
            <h5>Unlock the Power of Your Network</h5>
            <p class="font-weight-light mb-0">A strong alumni network is a powerful asset for any program.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="landpage/GettyImages-954142634.jpg" alt="">
            <h5>Get the Band Back Together</h5>
            <p class="font-weight-light mb-0">Create events and manage the attendees with a few clicks.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action -->
  <section class="call-to-action text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h2 class="mb-4">Ready to get started? Sign up now!</h2>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form>
            <div class="form-row">
              <div class="col-12 col-md-9 mb-2 mb-md-0">
                <input type="email" class="form-control form-control-lg" placeholder="Enter your email...">
              </div>
              <div class="col-12 col-md-3">
                <button type="submit" class="btn btn-block btn-lg btn-primary">Sign up!</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

@endsection
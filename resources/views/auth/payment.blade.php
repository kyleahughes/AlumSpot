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
  <script src="https://js.stripe.com/v3/"></script>
    
  </head>

  <body>
      
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
        
    <form action="/payment" method="POST">
        <input id="card-holder-name" type="text">

        <!-- Stripe Elements Placeholder -->
        <div id="card-element"></div>

        <button type="submit"  id="card-button" data-secret="{{ $intent->client_secret }}" >
            Update Payment Method
        </button>
    </form>
    
      <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <ul class="list-inline mb-2">
            <li class="list-inline-item">
              <a href="#">About</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Contact</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
          </ul>
          <p class="text-muted small mb-4 mb-lg-0">&copy; AlumSpot 2019. All Rights Reserved.</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
        
    <!-- Bootstrap core JavaScript -->
    <script src="js/LandPage/jquery/jquery.min.js"></script>
    <script src="js/LandPage/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="https://js.stripe.com/v3/"></script>

    <script>
        const stripe = Stripe('pk_test_0pGGHwWbKDRmR2pZdctnj56j');

        const elements = stripe.elements();
        const cardElement = elements.create('card');

        cardElement.mount('#card-element');
    </script>
    
    <script>
        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;

        cardButton.addEventListener('click', async (e) => {
            const { setupIntent, error } = await stripe.handleCardSetup(
                clientSecret, cardElement, {
                    payment_method_data: {
                        billing_details: { name: cardHolderName.value }
                    }
                }
            );

            if (error) {
                // Display "error.message" to the user...
                "Card not found"
            } else {
                // The card has been verified successfully...
                "verified snitches"
            }
        });    
    </script>
    </body>

</html>
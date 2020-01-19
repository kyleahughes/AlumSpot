
<!DOCTYPE html>
<html lang="en">

  <head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Checkout</title>
  <script src="https://js.stripe.com/v3/"></script>
  <link rel="stylesheet" href="StripeElements.css">
    
  </head>

    <body>

        <!-- Use the CSS tab above to style your Element's container. -->
        <div id="card-element" class="MyCardElement">
          <!-- Elements will create input elements here -->
        </div>

        <!-- We'll put the error messages in this element -->
        <div id="card-errors" role="alert"></div>

        <button id="submit">Pay</button>
        
    </body>

    <script>
        // Set your publishable key: remember to change this to your live publishable key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        var stripe = Stripe('pk_test_0pGGHwWbKDRmR2pZdctnj56j');
        var elements = stripe.elements();
    </script>
</html>